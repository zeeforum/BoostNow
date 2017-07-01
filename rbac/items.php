<?php
return [
    'createPost' => [
        'type' => 2,
        'description' => 'Create a post',
    ],
    'updatePost' => [
        'type' => 2,
        'description' => 'Update post',
    ],
    'author' => [
        'type' => 1,
        'children' => [
            'createPost',
            'updateOwnPost',
        ],
    ],
    'admin' => [
        'type' => 1,
        'children' => [
            'updatePost',
            'author',
        ],
    ],
    'updateOwnPost' => [
        'type' => 2,
        'description' => 'Update own post',
        'ruleName' => 'isAuthor',
        'children' => [
            'updatePost',
        ],
    ],
];
