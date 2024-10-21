<?php

use Laravel\Nova\Fields\BelongsTo; // Or HasMany, BelongsToMany, etc.

BelongsTo::make('User')
    ->hideFromIndex() // Or hideFromDetail()

