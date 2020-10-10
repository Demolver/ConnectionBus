<?php

declare(strict_types=1);

namespace App\Controller;

use App\Enum\ClientTypeEnum;
use App\Service\ClientService;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;
use App\Dto\RestSettingDto;
use App\Dto\HttpSettingDto;
use App\Dto\GrpcSettingDto;

use Swagger\Annotations as SWG;

/**
 * @Route("get-setting")
 * @SWG\Tag(name="GetSetting")
 */
final class GetSettingController
{
    private ClientService $clientService;

    private SerializerInterface $serializer;

    /**
     * ClientController constructor.
     *
     * @param ClientService       $clientService
     * @param SerializerInterface $serializer
     */
    public function __construct(ClientService $clientService, SerializerInterface $serializer)
    {
        $this->clientService = $clientService;
        $this->serializer = $serializer;
    }

    /**
     * @return Response
     *
     * @Route("/rest", methods={"GET"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="Get setting for rest service",
     *     @SWG\Schema(
     *        ref=@Model(type=RestSettingDto::class)
     *     )
     * )
     */
    public function actionRestClient(): Response
    {
        $dto = $this->clientService->getSetting(ClientTypeEnum::REST_CLIENT);

        $request = $this->serializer->serialize($dto, JsonEncoder::FORMAT);

        return new Response($request);
    }

    /**
     * @return Response
     *
     * @Route("/grpc", methods={"GET"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="Get setting for grpc service",
     *     @SWG\Schema(
     *        ref=@Model(type=GrpcSettingDto::class)
     *     )
     * )
     */
    public function actionGrpcClient(): Response
    {
        $dto = $this->clientService->getSetting(ClientTypeEnum::GRPS_CLIENT);

        $request = $this->serializer->serialize($dto, JsonEncoder::FORMAT);

        return new Response($request);
    }

    /**
     * @return Response
     *
     * @Route("/http", methods={"GET"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="Get setting for http srvice",
     *     @SWG\Schema(
     *        ref=@Model(type=HttpSettingDto::class)
     *     )
     * )
     */
    public function actionHttpClient(): Response
    {
        $dto = $this->clientService->getSetting(ClientTypeEnum::HTTP_CLIENT);

        $request = $this->serializer->serialize($dto, JsonEncoder::FORMAT);

        return new Response($request);
    }
}
