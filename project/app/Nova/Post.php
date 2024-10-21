<?php

// In app/Nova/Post.php
// In your Nova Resource (e.g., Post.php)

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Text;

public function fields(Request $request)
{
    return [
        ID::make()->sortable(),
        Text::make('Title'),
        BelongsTo::make('User'), // The relationship you want to load later
    ];
}

// In your LoadRelations action

public function handle(ActionFields $fields, Collection $models)
{
    // No action needed here, we'll handle the loading with JavaScript
}

public function fields()
{
    return []; // No fields needed for this action
}