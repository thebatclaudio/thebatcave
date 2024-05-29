<?php

declare(strict_types=1);

namespace App\Renderers;

use Illuminate\Support\Str;
use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Util\HtmlElement;
use Spatie\LaravelMarkdown\Renderers\AnchorHeadingRenderer as SpatieRenderer;

final class AnchorHeadingRenderer extends SpatieRenderer
{
    private const array CLASSES = [
        1 => 'text-6xl mt-20 font-bold',
        2 => 'text-5xl mt-20 font-bold',
        3 => 'text-4xl mt-10 font-bold',
        4 => 'text-3xl mt-4 font-bold',
        5 => 'text-2xl mt-4 font-bold',
        6 => 'text-xl mt-4 font-bold',
    ];

    public function render(Node $node, ChildNodeRendererInterface $childRenderer): HtmlElement
    {
        $element = $this->createElement($node, $childRenderer);

        $id = Str::slug($element->getContents());

        $classes = self::CLASSES[$node->getLevel()];

        if (! $this->renderAnchorsAsLinks) {
            $element->setAttribute('id', $id);
            $element->setAttribute('class', $classes);

            return $element;
        }

        return new HtmlElement(
            'a',
            ['href' => "#{$id}"],
            "<h{$node->getLevel()} id='{$id}' class='{$classes}'>{$element->getContents()}</h{$node->getLevel()}>"
        );
    }
}
