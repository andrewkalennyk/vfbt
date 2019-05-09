<tr>
    <td align="right" valign="middle">{{$citizen->id}}</td>
    <td align="left" valign="middle">{{$citizen->citizen->last_name}}</td>
    <td align="left" valign="middle">{{$citizen->citizen->first_name}}</td>
    <td align="left" valign="middle">{{$citizen->citizen->patronymic_name}}</td>
    <td align="left" valign="middle">{{$citizen->street->title}}</td>
    <td align="left" valign="middle">{{$citizen->house->title}}</td>
    <td align="left" valign="middle"><br></td>
    <td align="left" valign="middle">{{$citizen->flat_number}}</td>
    <td align="left" valign="middle">{{$citizen->citizen->date_birth}}</td>
    <td align="left" valign="middle">{{$citizen->citizen->phone}}</td>
    <td align="right" valign="middle">{{$citizen->citizen->citizens_category_id}}</td>
    <td align="right" valign="middle">{{$citizen->citizen->certificate_number}}</td>
    <td align="left" valign="middle"><br></td>
    <td align="left" valign="middle">{{$citizen->house_citizen->getStatus()}}</td>
    <td align="left" valign="middle">{{$citizen->preparePromotions($filters)}}<br></td>
    <td align="left" valign="middle"><br></td>
    <td align="left" valign="middle"><br>{{$citizen->citizen->isBlack()}}</td>
</tr>