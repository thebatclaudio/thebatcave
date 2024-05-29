<?php

declare(strict_types=1);

namespace App\Renderers;

use League\CommonMark\Node\Block\Paragraph;
use League\CommonMark\Node\Block\TightBlockInterface;
use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use League\CommonMark\Util\HtmlElement;
use League\CommonMark\Xml\XmlNodeRendererInterface;

final class ParagraphRenderer implements NodeRendererInterface, XmlNodeRendererInterface
{
    /**
     * @param  Paragraph  $node
     *
     * {@inheritDoc}
     *
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    public function render(Node $node, ChildNodeRendererInterface $childRenderer): HtmlElement|\Stringable|string|null
    {
        Paragraph::assertInstanceOf($node);

        if ($this->inTightList($node)) {
            return $childRenderer->renderNodes($node->children());
        }

        $attrs = $node->data->get('attributes');

        return (new HtmlElement('p', $attrs, $childRenderer->renderNodes($node->children())))
            ->setAttribute('class', 'mt-4');
    }

    public function getXmlTagName(Node $node): string
    {
        return 'paragraph';
    }

    /**
     * {@inheritDoc}
     */
    public function getXmlAttributes(Node $node): array
    {
        return [];
    }

    private function inTightList(Paragraph $node): bool
    {
        // Only check up to two (2) levels above this for tightness
        $i = 2;
        while (($node = $node->parent()) && $i--) {
            if ($node instanceof TightBlockInterface) {
                return $node->isTight();
            }
        }

        return false;
    }
}
