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

function actingAsPurchaseOrderReceiptApiUser(array $permissions = []): User
{
    $user = SecurityHelper::authenticateWithPermissions($permissions);

    $user->forceFill([
        'resource_permission' => PermissionType::GLOBAL,
    ])->saveQuietly();

    return $user;
}

function purchaseOrderReceiptRoute(mixed $order): string
{
    return route('admin.api.v1.purchases.purchase-orders.receipts.index', ['purchase_order' => $order]);
}

it('requires authentication to list purchase order receipts', function () {
    $order = Order::factory()->create();

    $this->getJson(purchaseOrderReceiptRoute($order->id))
        ->assertUnauthorized();
});

it('forbids listing purchase order receipts without permission', function () {
    actingAsPurchaseOrderReceiptApiUser();

    $order = Order::factory()->create();

    $this->getJson(purchaseOrderReceiptRoute($order->id))
        ->assertForbidden();
});

it('lists purchase order receipts for authorized users (empty when inventories not installed)', function () {
    actingAsPurchaseOrderReceiptApiUser(['view_purchase_purchase::order']);

    $order = Order::factory()->create();

    $this->getJson(purchaseOrderReceiptRoute($order->id))
        ->assertOk()
        ->assertJsonStructure(['data']);
});

it('returns 404 for a non-existent purchase order when listing receipts', function () {
    actingAsPurchaseOrderReceiptApiUser(['view_purchase_purchase::order']);

    $this->getJson(purchaseOrderReceiptRoute(999999))
        ->assertNotFound();
});
