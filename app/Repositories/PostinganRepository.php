<?php

namespace App\Repositories;

use App\Interfaces\PostinganInterface;
use App\Models\PostinganModel;
use Carbon\Carbon;

class PostinganRepository implements PostinganInterface
{
  private PostinganModel $postinganModel;
  public function __construct(PostinganModel $postinganModel)
  {
    $this->postinganModel = $postinganModel;
  }

  public function getAllPayload(array $meta)
  {
    try {
      $data = $this->postinganModel->joinList()->orderBy('postingan.created_at', 'desc')->get();

      $payloadList = array(
        "message" => "Berhasil mengambil data",
        "code"    => 200,
        "icon"    => 'success',
        "data"    => $data
      );
    } catch (\Throwable $th) {
      $payloadList = array(
        'message' => $th->getMessage(),
        'code'    => 500,
        'icon'    => 'error',
        'from'    => "jabatan get all"
      );
    }

    return $payloadList;
  }

  public function upsertPayload($id, array $payload)
  {
    try {
      $date = Carbon::now();

      if ($id) {

        $findData = $this->getPayloadById($id);
        if ($findData['code'] == 404) {
          return $findData;
        }

        $payload['updated_at'] = $date;

        $data    = $this->postinganModel->whereId($id)->update($payload);
        $message = "Data berhasil perbaharui";
      } else {

        $payload['created_at'] = $date;
        $payload['updated_at'] = $date;

        $data    = $this->postinganModel->create($payload);
        $message = "Data berhasil dibuat";
      }

      $payloadList = array(
        "message" => $message,
        "code"    => 200,
        "icon"    => 'success',
        "data"    => $data
      );
    } catch (\Throwable $th) {
      $payloadList = array(
        'message' => $th->getMessage(),
        'code'    => 500,
        'icon'    => 'error',
        'from'    => "jabatan upsert"
      );
    }

    return $payloadList;
  }

  public function getPayloadById($id)
  {
    try {
      $data = $this->postinganModel->where('postingan.id', $id)->joinList()->orderBy('postingan.created_at', 'desc')->first();

      if (!$data) {
        $message = "Data tidak ditemukan";
        $code    = 404;
        $icon    = 'info';
      } else {
        $message = "Data berhasil ditemukan";
        $code    = 200;
        $icon    = 'success';
      }

      $payloadList = array(
        "message" => $message,
        "code"    => $code,
        "icon"    => $icon,
        "data"    => $data
      );
    } catch (\Throwable $th) {
      $payloadList = array(
        'message' => $th->getMessage(),
        'code'    => 500,
        'icon'    => 'error',
        'from'    => "jabatan get by id"
      );
    }

    return $payloadList;
  }

  public function deletePayload($id)
  {
    try {
      $data = $this->postinganModel->whereId($id);

      if (!$data->first()) {
        $message = "Data tidak ditemukan";
        $code    = 404;
        $icon    = 'info';
      } else {
        $message = "Data berhasil dihapus";
        $code    = 200;
        $icon    = 'success';
      }

      $payloadList = array(
        "message" => $message,
        "code"    => $code,
        "icon"    => $icon,
        "data"    => $data->delete()
      );
    } catch (\Throwable $th) {
      $payloadList = array(
        'message' => $th->getMessage(),
        'code'    => 500,
        'icon'    => 'error',
        'from'    => "jabatan delete"
      );
    }

    return $payloadList;
  }
}
