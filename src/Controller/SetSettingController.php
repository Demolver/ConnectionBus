<?php

declare(strict_types=1);

namespace App\Controller;

use App\Dto\GrpcSettingDto;
use App\Dto\HttpSettingDto;
use App\Dto\RestSettingDto;
use App\Enum\ClientTypeEnum;
use App\Factory\SettingGrpcClient;
use App\Service\ClientService;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;
use Swagger\Annotations as SWG;

/**
 * @Route("set-setting")
 * @SWG\Tag(name="SetSetting")
*/
final class SetSettingController
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
     * @param Request $request
     * @return Response
     *
     * @Route("/rest", methods={"PUT"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="Set rest client setting"
     * )
     * @SWG\Parameter(
     *    name="RestClient",
     *    in="body",
     *    required=true,
     *    @SWG\Schema(
     *        ref=@Model(type=RestSettingDto::class)
     *    )
     * )
     */
    public function actionRestClient(Request $request): Response
    {
        /**
         * @var RestSettingDto $dto
        */
        $dto = $this->serializer->deserialize(
            $request->getContent(),
            RestSettingDto::class,
            JsonEncoder::FORMAT
        );

        $this->clientService->setSetting(ClientTypeEnum::REST_CLIENT, $dto);

        return new Response();
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @Route("/grpc", methods={"PUT"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="Set grsp client setting"
     * )
     * @SWG\Parameter(
     *    name="GrpcClient",
     *    in="body",
     *    required=true,
     *    @SWG\Schema(
     *        ref=@Model(type=GrpcSettingDto::class)
     *    )
     * )
     */
    public function actionGrpcClient(Request $request): Response
    {
        /**
         * @var SettingGrpcClient $dto
         */
        $dto = $this->serializer->deserialize(
            $request->getContent(),
            GrpcSettingDto::class,
            JsonEncoder::FORMAT
        );

        $this->clientService->setSetting(ClientTypeEnum::GRPS_CLIENT, $dto);

        return new Response();
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @Route("/http", methods={"PUT"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="Set http client setting"
     * )
     * @SWG\Parameter(
     *    name="HttpClient",
     *    in="body",
     *    required=true,
     *    @SWG\Schema(
     *        ref=@Model(type=HttpSettingDto::class)
     *    )
     * )
     */
    public function actionHttpClient(Request $request): Response
    {
        /**
         * @var HttpSettingDto $dto
         */
        $dto = $this->serializer->deserialize(
            $request->getContent(),
            HttpSettingDto::class,
            JsonEncoder::FORMAT
        );

        $this->clientService->setSetting(ClientTypeEnum::HTTP_CLIENT, $dto);

        return new Response();
    }
}
