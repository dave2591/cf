<?php

declare(strict_types=1);

namespace App\Http\Actions;

use App\CurrencyFair\DomainObjects\DomainObjectInterface;
use App\CurrencyFair\Transformers\Transformer;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\Response as HttpCodes;

class BaseAction extends Controller
{
    /**
     * @param mixed $data
     * @return Response
     */
    protected function createdResponse($data = null): Response
    {
        return response($data, HttpCodes::HTTP_CREATED);
    }

    /**
     * @param Collection|DomainObjectInterface[] $collection
     * @return Response
     */
    protected function collectionResponse(Collection $collection): Response
    {
        return response(Transformer::transformCollection($collection), HttpCodes::HTTP_OK);
    }
}
