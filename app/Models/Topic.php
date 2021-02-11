<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * A single topic discussed in an episode.
 *
 * @author Vincent Neubauer <v.neubauer@darlor.de>
 * @package App\Models
 *
 * @property string $name Name of the topic
 * @property int $start Amount of seconds into the {@see Episode}, where this topic gets discussed
 * @property int $end Amount of seconds into the {@see Episode}, where this topic's discussion ends
 * @property bool $ad Whether this topic is an ad or not
 * @property bool $community_contribution Whether this topic was suggested by the community or if the hosts themselves
 *     came up with it.
 *
 * @property Episode $episode The {@see Episode}, in which this topic gets discussed
 * @property Collection|Subtopic[] $subtopics All {@see Subtopic}s that too get discussed in this section
 */
class Topic extends Model
{
    protected $fillable = [
        'name',
        'start',
        'end',
        'ad',
        'community_contribution',
    ];

    /**
     * The {@see Episode}, in which this topic gets discussed
     *
     * @return BelongsTo
     */
    public function episode(): BelongsTo
    {
        return $this->belongsTo(Episode::class);
    }

    /**
     * All {@see Subtopic}s that too get discussed in this section
     *
     * @return HasMany
     */
    public function subtopic(): HasMany
    {
        return $this->hasMany(Subtopic::class);
    }
}