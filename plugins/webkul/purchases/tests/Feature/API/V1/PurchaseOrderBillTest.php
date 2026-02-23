<?php

use Webkul\Purchase\Models\Order;
use Webkul\Security\Enums\PermissionType;
use Webkul\Security\Models\User;

require_once __DIR__.'/../../../../../support/tests/Helpers/SecurityHelper.php';
require_once __DIR__.'/../../../../../support/tests/Helpers/TestBootstrapHelper.php';

beforeEach(function () {
    TestBootstrapHelper::ensurePluginInstalled('purchases');
    SecurityHelper::disableUserEvents();
});

afterEach(fn () => SecurityHelper::restoreUserEvents());

function actingAsPurchaseOrderBillApiUser(array $permissions = []): User
{
    $user = SecurityHelper::authenticateWithPermissions($permissions);

    $user->forceFill([
        'resource_permission' => PermissionType::GLOBAL,
    ])->saveQuietly();

    return $user;
}

function purchaseOrderBillRoute(mixed $order): string
{
    return route('admin.api.v1.purchases.purchase-orders.bills.index', ['purchase_order' => $order]);
}

it('requires authentication to list purchase order bills', function () {
    $order = Order::factory()->create();

    $this->getJson(purchaseOrderBillRoute($order->id))
        ->assertUnauthorized();
});

it('forbids listing purchase order bills without permission', function () {
    actingAsPurchaseOrderBillApiUser();

    $order = Order::factory()->create();

    $this->getJson(purchaseOrderBillRoute($order->id))
        ->assertForbidden();
});

it('lists purchase order bills for authorized users', function () {
    actingAsPurchaseOrderBillApiUser(['view_purchase_purchase::order']);

    $order = Order::factory()->create();

    $this->getJson(purchaseOrderBillRoute($order->id))
        ->assertOk()
        ->assertJsonStructure(['data']);
});

it('returns 404 for a non-existent purchase order when listing bills', function () {
    actingAsPurchaseOrderBillApiUser(['view_purchase_purchase::order']);

    $this->getJson(purchaseOrderBillRoute(999999))
        ->assertNotFound();
});
