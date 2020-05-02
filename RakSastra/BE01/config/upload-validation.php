<?php

return [
    'default' => ['required'],

    'avatar-image' => ['required|mimes:jpg,jpeg,png|max:1024'],

    'excel' => ['required|mimes:xlsx,xls'],

    'foto' => ['required|mimes:jpg,jpeg,png|max:2048'],

    'dokumen-sk' => ['required|mimes:pdf,doc,docx|max:20480']
];