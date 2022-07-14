@php
$setting = DB::table('settings')->first();  
@endphp

<a href="/dashboard" class="brand-link">   
    <img src="{{ (!empty($setting->image)) ? url('backend/all-images/web/logo/'.$setting->image): url('backend/all-images/web/default/loader.png') }}" alt="" class="brand-image" style="opacity: .8"><br/>
</a>