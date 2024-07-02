<?php

namespace App\Services;


class BotService
{
    public function fileUpload($request, &$data)
    {
        if(!empty($request->file('image'))){
            $image = $request->file('image');
            $fileName = time() . '.' . $image->getClientOriginalName();
            $image->move(public_path('files'), $fileName);

            $data['image'] = $fileName;
        }
    }
}
