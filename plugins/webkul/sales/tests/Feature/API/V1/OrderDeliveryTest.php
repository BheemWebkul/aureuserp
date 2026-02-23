<?php

use Webkul\Sale\Models\Order;

require_once __DIR__.'/../../../../../support/tests/Helpers/SecurityHelper.php';
require_once __DIR__.'/../../../../../support/tests/Helpers/TestBootstrapHelper.php';

const SALES_ORDER_DELIVERY_JSON_STRUCTURE = [
    'id',
    'sale_order_id',
];

beforeEach(function () {
    TestBootstrapHelper::ensurePluginInstalled('sales');
    SecurityHelper::disableUserEvents();
});

afterEach(fn () => SecurityHelper::restoreUserEvents());

function actingAsSalesOrderDeliveryApiUser(array $permissions = []): void
{
    SecurityHelper::authenticateWithPermissions($permissions);
}

function salesOrderDeliveryRoute(string $action, mixed $order): string
{
    return route("admin.api.v1.sales.orders.deliveries.{$action}", ['order' => $order]);
}

function createOrderWithDeliveries(int $deliveryCount = 2): Order
{
    return Order::factory()->create();
}

it('requires authentication to list order deliveries', function () {
    $order = createOrderWithDeliveries();

    $this->getJson(salesOrderDeliveryRoute('index', $order->id))
        ->assertUnauthorized();
});

it('forbids listing order deliveries without permission', function () {
    $order = createOrderWithDeliveries();

    actingAsSalesOrderDeliveryApiUser();

    $this->getJson(salesOrderDeliveryRoute('index', $order->id))
        ->assertForbidden();
});

it('lists order deliveries for authorized users', function () {
    $order = createOrderWithDeliveries();

    actingAsSalesOrderDeliveryApiUser(['view_sale_order']);

    $this->getJson(salesOrderDeliveryRoute('index', $order->id))
        ->assertOk()
        ->assertJsonStructure(['data']);
});

it('returns 404 for a non-existent order when listing deliveries', function () {
    actingAsSalesOrderDeliveryApiUser(['view_sale_order']);

    $this->getJson(salesOrderDeliveryRoute('index', 999999))
        ->assertNotFound();
});
