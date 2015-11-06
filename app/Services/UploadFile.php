<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
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
        if ( ! File::isWritable(storage_path('app/'.$path)) )
            return ['cod'=>'0','msg'=>'[ERRO] Diretorio sem permissão de escrita.'];
        if ( Storage::exists('app/'.$path.'/'.$filename))
            return ['cod'=>'0','msg'=>'[ERRO] Já existe um arquivo com este nome.'];

        return Storage::disk('local')->put($path.$filename, file_get_contents($file->getRealPath()));
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
