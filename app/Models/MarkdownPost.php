<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use TheBatClaudio\EloquentMarkdown\Models\MarkdownModel;
use TheBatClaudio\EloquentMarkdown\Models\Traits\WithDate;

/**
 * @property string $title
 *
 * @mixin Builder
 */
class MarkdownPost extends MarkdownModel
{
    use WithDate;

    public static function findByDateAndSlug(string $year, string $month, string $day, string $slug): self
    {
        return self::find(
            static::makeIdFromDateAndSlug($year, $month, $day, $slug)
        );
    }

    public static function makeIdFromDateAndSlug(string $year, string $month, string $day, string $slug): string
    {
        return $year.'-'.$month.'-'.$day.'-'.$slug;
    }

    public function url(): string
    {
        return route('posts.show', [
            'slug' => $this->slug,
            'year' => $this->date->format('Y'),
            'month' => $this->date->format('m'),
            'day' => $this->date->format('d'),
        ]);
    }

    public function imageUrl(): string
    {
        return url("/storage/post_images/$this->image");
    }
}
