<?php

namespace App\Enums;

enum PermissionEnum: string
{
        // PPUF
    case LIST_PPUF = 'list ppuf';
    case CREATE_PPUF = 'create ppuf';
    case VIEW_PPUF = 'view ppuf';
    case UPDATE_PPUF = 'update ppuf';
    case DELETE_PPUF = 'delete ppuf';
    case IMPORT_PPUF = 'import ppuf';
    case EXPORT_PPUF = 'export ppuf';
    case SET_ACTIVE_PPUF_YEAR = 'set active ppuf year';

        // SUBMISSION
    case LIST_SUBMISSION = 'list submission';
    case CREATE_SUBMISSION = 'create submission';
    case VIEW_SUBMISSION = 'view submission';
    case UPDATE_SUBMISSION = 'update submission';
    case DELETE_SUBMISSION = 'delete submission';
    case IMPORT_SUBMISSION = 'import submission';
    case EXPORT_SUBMISSION = 'export submission';
    case APPROVE_SUBMISSION = 'approve submission';

        // USER
    case LIST_USER = 'list user';
    case CREATE_USER = 'create user';
    case VIEW_USER = 'view user';
    case UPDATE = 'update user';
    case DELETE_USER = 'delete user';
    case SET_ROLE = 'set role';
    case SET_PERMISSION = 'set permission';

        // ROLE
    case LIST_ROLE = 'list role';
    case CREATE_ROLE = 'create role';
    case VIEW_ROLE = 'view role';
    case UPDATE_ROLE = 'update role';
    case DELETE_ROLE = 'delete role';
    case SET_ROLE_PERMISSION = 'set role permission';

    public function getPermissions(): array
    {
        return [
            'ppuf' => [
                self::LIST_PPUF->value,
                self::CREATE_PPUF->value,
                self::VIEW_PPUF->value,
                self::UPDATE_PPUF->value,
                self::DELETE_PPUF->value,
                self::IMPORT_PPUF->value,
                self::EXPORT_PPUF->value,
                self::SET_ACTIVE_PPUF_YEAR->value
            ],
            'submission' => [
                self::LIST_SUBMISSION->value,
                self::CREATE_SUBMISSION->value,
                self::VIEW_SUBMISSION->value,
                self::UPDATE_SUBMISSION->value,
                self::DELETE_SUBMISSION->value,
                self::IMPORT_SUBMISSION->value,
                self::EXPORT_SUBMISSION->value,
                self::APPROVE_SUBMISSION->value
            ],
            'user' => [
                self::LIST_USER->value,
                self::CREATE_USER->value,
                self::VIEW_USER->value,
                self::UPDATE->value,
                self::DELETE_USER->value,
                self::SET_ROLE->value,
                self::SET_PERMISSION->value
            ],
            'role' => [
                self::LIST_ROLE->value,
                self::CREATE_ROLE->value,
                self::VIEW_ROLE->value,
                self::UPDATE_ROLE->value,
                self::DELETE_ROLE->value,
                self::SET_ROLE_PERMISSION->value
            ]
        ];
    }
}
