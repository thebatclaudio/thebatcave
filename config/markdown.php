<?php

declare(strict_types=1);

use App\Renderers\AnchorHeadingRenderer;
use App\Renderers\ParagraphRenderer;
use League\CommonMark\Extension\CommonMark\Node\Block\Heading;
use League\CommonMark\Node\Block\Paragraph;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Markdown Disk
    |--------------------------------------------------------------------------
    |
    | This option defines the default storage disk where markdown files will be saved and retrieved.
    |
    */

    'disk' => 'posts',

    'block_renderers' => [
        ['class' => Heading::class, 'renderer' => AnchorHeadingRenderer::class, 'priority' => 10],
        ['class' => Paragraph::class, 'renderer' => ParagraphRenderer::class, 'priority' => 10],
    ],

    'cache_store' => false,
];
