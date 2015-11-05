<?php

namespace App\Services;

use Illuminate\Support\Facades\Storagerage;
use Illuminate\Support\Facades\File;

class UploadFile
{
    protected $disk;

    /** Recebe a configuração do local onde deve ser feito o upload
     * @param $config
     */
//    public function __construct($config='local')
//    {
//        $this->disk = Storage::disk(config('blog.uploads.storage'));
//    }

    public function upload($path,$filename,$file)
    {
        // Verifica se o diretório permite escrita
        if ( ! File::isWritable(storage_path('appp/'.$path)) )
        {
            //@TODO tratar este retorno para que nao dê crash no sistema, apenas apresente a msg na tela
            return ['cod'=>'1','msg'=>'[ERRO] Diretorio sem permissão de escrita.'];
        }


        $upload = Storage::disk('local')->put($path.$newFilename, file_get_contents($file->getRealPath()));
    }

    public function download()
    {

    }

    public function deleteFile()
    {

    }

    public function getMimeType()
    {

    }

    public function getFileSize()
    {

    }

    public function makeDir()
    {

    }

}