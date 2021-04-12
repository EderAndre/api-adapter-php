<?php
/**
 * @OA\Get(
 *   path = "/api/v1/audienciasbyrange",
 *   tags={"Audiencias"},
 *   summary = "Get all register in portal api audiencias, required defined dinamic range",
 *   description = "Get all register in portal api audiencias, identified by id_defensor",
 *   @OA\Response(
 *     response = 200,
 *     description = "A objects list from audiencias with attributes",
 *     content={
 *             @OA\MediaType(
 *                 mediaType="application/json",
 *                 @OA\Schema(
 *                     
 *                     example={
   {
  "audiencias": {
    {
      "type": "audiencia",
      "id": -1726795257,
      "data": "04/08/2020",
      "hora": "10:00",
      "defensor": "xd123456",
      "defensoria": 274,
      "processo": "00122000220083",
      "processoTipo": null,
      "solenidade": "Audiência",
      "situacao": null,
      "area": 3,
      "ativo": null,
      "fromTj": true,
      "orgaoJulgador": {
        "idOrgaoJulgador": 2115,
        "nome": "2º Juizado de Violência Doméstica e Familiar",
        "grau": "P",
        "foro": {
          "idForo": 1003,
          "nome": "Foro Central (Prédio I)"
        },
        "comarca": {
          "idComarca": 1002,
          "idComarcaT1g": 1,
          "nome": "Porto Alegre"
        }
      }
    }
   }
}
 *                     }
 *                 )
 *             )
 *         }
 *   ),
 *     @OA\Response(
 *         response=401,
 *         description="Unautorized",
 *          content={
 *              @OA\MediaType(
 *                 mediaType="application/json",
 *                  @OA\Schema(
 *              
 *                      example="Authentication Failed"
 *                  )
 *          )
 *          }
 *     ),
 *     @OA\Response(
 *         response=403,
 *         description="Prohibited",
 *          content={
 *              @OA\MediaType(
 *                 mediaType="application/json",
 *                  @OA\Schema(
 *              
 *                      example="Invalid APi Key"
 *                  )
 *          )
 *          }
 *     ),
 *     @OA\Response(
 *         response="default",
 *         description="unexpected error"
 *     ),
 *   @OA\Parameter(
 *     name = "id_defensor",
 *     in = "query",
 *     description = "Id defensor(matricula)",
 *     required = true,
 *   @OA\Schema(
 *       type = "string",
 *     ),
 *     style = "form"
 *   ),
 *   @OA\Parameter(
 *     name = "data_ini",
 *     in = "query",
 *     description = "Start date from query, formatted dd/MM/YYYY",
 *     required = true,
 *   @OA\Schema(
 *       type = "string",
 *     ),
 *     style = "form"
 *   ),
 *   @OA\Parameter(
 *     name = "data_end",
 *     in = "query",
 *     description = "Start date from query, formatted dd/MM/YYYY",
 *     required = true,
 *   @OA\Schema(
 *       type = "string",
 *     ),
 *     style = "form"
 *   ),
 *
 *
 *   security={
 *     { "ApiKey": {},"ApiClient": {}}
 *   }
 * )
 */
