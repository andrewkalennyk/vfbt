<tr>
    <td align="right" valign="middle">{{$citizen->id}}</td>
    <td align="left" valign="middle">{{$citizen->last_name}}</td>
    <td align="left" valign="middle">{{$citizen->first_name}}</td>
    <td align="left" valign="middle">{{$citizen->patronymic_name}}</td>
    <td align="left" valign="middle">{!! $citizen->detail_address !!}</td>
    <td align="left" valign="middle">{{$citizen->date_birth}}</td>
    <td align="left" valign="middle">{{$citizen->phone}}</td>
    <td align="right" valign="middle">{!! $citizen->index_category !!}</td>
    <td align="right" valign="middle">{{$citizen->certificate_number}}</td>
    <td align="left" valign="middle"><br></td>
    <td align="left" valign="middle">{!!  $citizen->index_status !!}</td>
    <td align="left" valign="middle">
        @if($citizen->promotions->count())
            @foreach($citizen->promotions as $promotion)
                {{$promotion->title}} <br>
            @endforeach
        @endif
    </td>
    <td align="left" valign="middle">{{$citizen->comment}}</td>
    <td align="left" valign="middle">{{$citizen->bad_list_status}}</td>
</tr>