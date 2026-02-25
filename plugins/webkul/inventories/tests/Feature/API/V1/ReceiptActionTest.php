<?php

use Webkul\Inventory\Enums\MoveState;
use Webkul\Inventory\Enums\OperationState;
use Webkul\Inventory\Models\Move;
use Webkul\Inventory\Models\Operation;
use Webkul\Security\Enums\PermissionType;
use Webkul\Security\Models\User;

require_once __DIR__.'/../../../../../support/tests/Helpers/SecurityHelper.php';
require_once __DIR__.'/../../../../../support/tests/Helpers/TestBootstrapHelper.php';

beforeEach(function () {
    TestBootstrapHelper::ensurePluginInstalled('inventories');
    SecurityHelper::disableUserEvents();
});

afterEach(fn () => SecurityHelper::restoreUserEvents());

function actingAsInventoryReceiptActionApiUser(array $permissions = []): User
{
    $user = SecurityHelper::authenticateWithPermissions($permissions);

    $user->forceFill([
        'resource_permission' => PermissionType::GLOBAL,
    ])->saveQuietly();

    return $user;
}

function inventoryReceiptActionRoute(string $action, mixed $operation): string
{
    return route("admin.api.v1.inventories.receipts.{$action}", $operation);
}

function createReceiptOperation(
    OperationState $state = OperationState::DRAFT,
    ?MoveState $moveState = null
): Operation {
    $operation = Operation::factory()
        ->receipt()
        ->create([
            'state' => $state,
        ]);

    if ($moveState) {
        Move::factory()->create([
            'operation_id'            => $operation->id,
            'operation_type_id'       => $operation->operation_type_id,
            'source_location_id'      => $operation->source_location_id,
            'destination_location_id' => $operation->destination_location_id,
            'company_id'              => $operation->company_id,
            'state'                   => $moveState,
        ]);
    }

    return $operation;
}

it('requires authentication to check receipt availability', function () {
    $operation = createReceiptOperation();

    $this->postJson(inventoryReceiptActionRoute('check-availability', $operation))
        ->assertUnauthorized();
});

it('forbids checking receipt availability without permission', function () {
    actingAsInventoryReceiptActionApiUser();
    $operation = createReceiptOperation();

    $this->postJson(inventoryReceiptActionRoute('check-availability', $operation))
        ->assertForbidden();
});

it('validates state before checking receipt availability', function () {
    actingAsInventoryReceiptActionApiUser(['update_inventory_receipt']);
    $operation = createReceiptOperation(OperationState::DRAFT, MoveState::CONFIRMED);

    $this->postJson(inventoryReceiptActionRoute('check-availability', $operation))
        ->assertUnprocessable()
        ->assertJsonPath('message', 'Only confirmed or assigned operations can check availability.');
});

it('validates eligible moves before checking receipt availability', function () {
    actingAsInventoryReceiptActionApiUser(['update_inventory_receipt']);
    $operation = createReceiptOperation(OperationState::CONFIRMED, MoveState::DRAFT);

    $this->postJson(inventoryReceiptActionRoute('check-availability', $operation))
        ->assertUnprocessable()
        ->assertJsonPath('message', 'No operation moves are eligible for availability check.');
});

it('validates state before setting receipt todo', function () {
    actingAsInventoryReceiptActionApiUser(['update_inventory_receipt']);
    $operation = createReceiptOperation(OperationState::CONFIRMED, MoveState::CONFIRMED);

    $this->postJson(inventoryReceiptActionRoute('todo', $operation))
        ->assertUnprocessable()
        ->assertJsonPath('message', 'Only draft operations can be set to todo.');
});

it('validates moves before setting receipt todo', function () {
    actingAsInventoryReceiptActionApiUser(['update_inventory_receipt']);
    $operation = createReceiptOperation(OperationState::DRAFT);

    $this->postJson(inventoryReceiptActionRoute('todo', $operation))
        ->assertUnprocessable()
        ->assertJsonPath('message', 'Cannot set operation to todo without moves.');
});

it('validates state before validating a receipt', function () {
    actingAsInventoryReceiptActionApiUser(['update_inventory_receipt']);
    $operation = createReceiptOperation(OperationState::DONE, MoveState::DONE);

    $this->postJson(inventoryReceiptActionRoute('validate', $operation))
        ->assertUnprocessable()
        ->assertJsonPath('message', 'Only non-done and non-canceled operations can be validated.');
});

it('validates state before canceling a receipt', function () {
    actingAsInventoryReceiptActionApiUser(['update_inventory_receipt']);
    $operation = createReceiptOperation(OperationState::DONE, MoveState::DONE);

    $this->postJson(inventoryReceiptActionRoute('cancel', $operation))
        ->assertUnprocessable()
        ->assertJsonPath('message', 'Only non-done and non-canceled operations can be canceled.');
});

it('validates state before returning a receipt', function () {
    actingAsInventoryReceiptActionApiUser(['update_inventory_receipt']);
    $operation = createReceiptOperation(OperationState::DRAFT, MoveState::DRAFT);

    $this->postJson(inventoryReceiptActionRoute('return', $operation))
        ->assertUnprocessable()
        ->assertJsonPath('message', 'Only done operations can be returned.');
});
