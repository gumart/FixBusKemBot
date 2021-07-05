<?php
declare(strict_types=1);


namespace App\Http\Services;


use JsonMapper;
use Psr\Http\Message\ResponseInterface;

class JSONMapperService
{

    private JsonMapper $jsonMapper;

    public function __construct(
        JsonMapper $jsonMapper
    ) {
        $this->jsonMapper = $jsonMapper;
    }

    /**
     * @template     T
     *
     * @param ResponseInterface $response
     * @param T                 $entity
     *
     * @return T
     * @noinspection PhpDocMissingThrowsInspection
     * @noinspection PhpDocSignatureInspection
     */
    public function decodeSingleEntity(ResponseInterface $response, object $entity)
    {
        $body = $response->getBody()->getContents();
        $decoded = json_decode($body, true, 512, JSON_THROW_ON_ERROR);

        return $this->decodeSingleEntityFromArray($decoded, $entity);
    }

    /**
     * @template     T
     *
     * @param ResponseInterface $response
     * @param T                 $entity
     *
     * @return array<T>
     * @noinspection PhpDocMissingThrowsInspection
     */
    public function decodeArrayOfEntities(ResponseInterface $response, object $entity): array
    {
        $body = $response->getBody()->getContents();
        $decoded = json_decode($body, true, 512, JSON_THROW_ON_ERROR);

        return $this->decodeArrayOfEntitiesFromArray($decoded, $entity);
    }

    /**
     * @template     T
     *
     * @param array  $data
     * @param object $entity
     *
     * @return T
     * @throws \JsonMapper_Exception
     */
    public function decodeSingleEntityFromArray(array $data, object $entity)
    {
        return $this->jsonMapper->map($data, $entity);
    }

    /**
     * @template     T
     *
     * @param array  $data
     * @param object $entity
     *
     * @return T
     * @throws \JsonMapper_Exception
     */
    public function decodeArrayOfEntitiesFromArray(array $data, object $entity)
    {
        $result = [];

        foreach ($data as $datum) {
            $result[] = $this->jsonMapper->map($datum, clone $entity);
        }

        return $result;
    }

}
