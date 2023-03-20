@if($ProtoData && is_object($ProtoData))

    @php
        if (App::getLocale() == "de")
            $title = $ProtoData->locale_name_de;
        elseif(App::getLocale() == "en")
            $title = $ProtoData->locale_name_en;
        else
            $title = $ProtoData->locale_name_en;
        if($ProtoData->type <= 2)
            $iconVnum = substr_replace($ProtoData->vnum, '0', -1, 1);
        else
            $iconVnum = $ProtoData->vnum;
        $itemdesc='unknown';
        if (App::getLocale() == "de") {
            $itemdesc = App\Http\Controllers\ProtoController::readItemDesc(1,$ProtoData->vnum);
        }
        elseif(App::getLocale() == "en") {
            $itemdesc = App\Http\Controllers\ProtoController::readItemDesc(0,$ProtoData->vnum);
        }
        else {//default
            $itemdesc = App\Http\Controllers\ProtoController::readItemDesc(0,$ProtoData->vnum);
        }
    @endphp
    <div class="card text-center border-warning mb-3 " style="width: 18rem;margin-top:150px;">
        @if (file_exists(public_path('images/proto/'.$iconVnum.'.png')))
            <img src="{{ asset('images/proto/'.$iconVnum.'.png') }}" style="width: 40px"
                 class="card-img-top mx-auto" title=" {{ $title }}">
        @else
            <img src="{{ asset('images/proto/no_image.png') }}" style="width: 40px" class="card-img-top mx-auto">
        @endif
        <div class="card-body">
            <h5 class="card-title">{{$title}}</h5>
            <p class="card-text">
                @if(isset($renderData) and $renderData['type'] == 'WEAPON')
                    <iframe
                        src='https://m2icondb.com/3d?model={{$renderData['model']}}&type={{$renderData['type']}}&width=240&height=400'
                        style='width: 240px; height: 400px; border: none;'></iframe>
                    <br>
                @elseif(isset($renderData) and $renderData['type'] == 'ARMOR')
                    @if(isset($renderData['sex']) and $renderData['sex'] == 'false')
                        <iframe
                            src='https://m2icondb.com/3d?type={{$renderData['type']}}&subtype={{$renderData['subtype']}}&value3={{$renderData['value3']}}&assassin={{$assassin}}&shaman={{$shaman}}&sura={{$sura}}&warrior={{$warrior}}&sex=false&width=240&height=400'
                            style='width: 240px; height: 400px; border: none;'></iframe>
                        <br>
                    @else
                        <iframe
                            src='https://m2icondb.com/3d?type={{$renderData['type']}}&subtype={{$renderData['subtype']}}&value3={{$renderData['value3']}}&assassin={{$assassin}}&shaman={{$shaman}}&sura={{$sura}}&warrior={{$warrior}}&sex=true&width=240&height=400'
                            style='width: 240px; height: 400px; border: none;'></iframe>
                        <br>
                    @endif
                @endif
                @if($itemdesc != 'unbekannt' or $itemdesc != 'unknown')
                    {{$itemdesc}}
                @endif
            </p>
        </div>
            @if(auth()->user() and \App\Models\Gmlist::find(auth()->user()->id))
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <ul>
                        <li>Anti:{{$ProtoData->antiflag}}</li>
                        <li>Flag:{{$ProtoData->flag}}</li>
                        <li>Wear:{{$ProtoData->wearflag}}</li>
                        <li>Immune:{{$ProtoData->immuneflag}}</li>
                    </ul>
                </li>
                <li class="list-group-item">
                    <ul>
                        <li>LimitType0:{{$ProtoData->limittype0}}</li>
                        <li>LimitValue0:{{$ProtoData->limitvalue0}}</li>
                        <li>LimitType1:{{$ProtoData->limittype1}}</li>
                        <li>LimitValue1:{{$ProtoData->limitvalue1}}</li>
                    </ul>
                </li>
                <li class="list-group-item">
                    <ul>
                        <li>Value0:{{$ProtoData->value0}}</li>
                        <li>Value1:{{$ProtoData->value1}}</li>
                        <li>Value2:{{$ProtoData->value2}}</li>
                        <li>Value3:{{$ProtoData->value3}}</li>
                        <li>Value4:{{$ProtoData->value4}}</li>
                    </ul>
                </li>
                <li class="list-group-item">
                    <ul>
                        <li>ApplyType0:{{$ProtoData->applytype0}}</li>
                        <li>ApplyValue0:{{$ProtoData->applyvalue0}}</li>
                        <li>ApplyType1:{{$ProtoData->applytype1}}</li>
                        <li>ApplyValue1:{{$ProtoData->applyvalue1}}</li>
                        <li>ApplyType2:{{$ProtoData->applytype2}}</li>
                        <li>ApplyValue2:{{$ProtoData->applyvalue2}}</li>
                    </ul>
                </li>
            </ul>
        @endif
        <div class="card-body">
            <a href="{{ url('protoAll_0_0_0')}}" class="card-link">{{__('messages.back')}}</a>
        </div>
    </div>

@else
    <div class="card" style="width: 18rem;">
        <img src="{{ asset('images/proto/no_image.png') }}" style="width: 40px" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">No Data</h5>
            <p class="card-text">No data found on DB</p>
        </div>
    </div>
@endif

<style>
    .card {
        margin: 0 auto; /* Added */
        float: none; /* Added */
        margin-bottom: 10px; /* Added */
    }
</style>
