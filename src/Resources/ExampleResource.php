<?php

namespace DreamFactory\Core\Skeleton\Resources;

use DreamFactory\Core\Enums\Verbs;
use DreamFactory\Core\Exceptions\BadRequestException;
use DreamFactory\Core\Exceptions\UnauthorizedException;
use DreamFactory\Core\Exceptions\NotFoundException;
use DreamFactory\Core\Git\Models\ExampleModel;
use DreamFactory\Core\Resources\BaseRestResource;
use DreamFactory\Core\Utility\JWTUtilities;
use DreamFactory\Core\Utility\Session;

// Resource can extend BaseRestResource,BaseSystemResource, ReadOnlySystemResource, or any newly created

class ExampleResource extends BaseRestResource
{
    const RESOURCE_NAME = 'example';

    /**
     * @var string DreamFactory\Core\Models\User Model Class name.
     */
    protected static $model = ExampleModel::class;

    /**
     * @param array $settings
     */
    public function __construct($settings = [])
    {
        $verbAliases = [
            Verbs::PUT => Verbs::PATCH
        ];
        $settings["verbAliases"] = $verbAliases;

        $this->exampleModel = new static::$model;
        parent::__construct($settings);
    }

    /**
     * Fetches example.
     *
     * @return array
     * @throws UnauthorizedException
     */
    protected function handleGET()
    {
        $user = Session::user();

        if (empty($user)) {
            throw new UnauthorizedException('There is no valid session for the current request.');
        }

        $content = [];
        dd($this->exampleModel->all());

        return $content;
    }

    /**
     * Updates user profile.
     *
     * @return array
     * @throws NotFoundException
     * @throws \Exception
     */
    protected function handlePOST()
    {
        $user = Session::user();

        if (empty($user)) {
            throw new NotFoundException('No user session found.');
        }
        return ["You sent a POST request to DF!"];
    }
}