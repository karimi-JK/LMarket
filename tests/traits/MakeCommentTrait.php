<?php

use Faker\Factory as Faker;
use App\Models\Admin\Comment;
use App\Repositories\Admin\CommentRepository;

trait MakeCommentTrait
{
    /**
     * Create fake instance of Comment and save it in database
     *
     * @param array $commentFields
     * @return Comment
     */
    public function makeComment($commentFields = [])
    {
        /** @var CommentRepository $commentRepo */
        $commentRepo = App::make(CommentRepository::class);
        $theme = $this->fakeCommentData($commentFields);
        return $commentRepo->create($theme);
    }

    /**
     * Get fake instance of Comment
     *
     * @param array $commentFields
     * @return Comment
     */
    public function fakeComment($commentFields = [])
    {
        return new Comment($this->fakeCommentData($commentFields));
    }

    /**
     * Get fake data of Comment
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCommentData($commentFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'version_id' => $fake->word,
            'user_id' => $fake->word,
            'text' => $fake->text,
            'rate' => $fake->word,
            'state' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $commentFields);
    }
}
