<table cellspacing="0" border="0">
    <tbody>
    <tr>
        <td colspan="12" height="24" align="left" style="border: 1px solid #000" valign="bottom">Район: СВЯТОШИНСЬКИЙ ПР.ПЕРЕМОГИ, 93</td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td colspan="12" height="27" align="left" valign="bottom"><b><i>?????</i></b></td>
        <td align="left" valign="bottom"><b><i>ДВК</i></b></td>
        <td align="right" valign="bottom" sdval="210" sdnum="1033;"><b><i>???</i></b></td>
        <td align="left" valign="bottom"><b><i><br></i></b></td>
        <td align="left" valign="bottom"><b><i><br></i></b></td>
        <td align="left" valign="bottom"><b><i><br></i></b></td>
    </tr>
    <tr>
        <td colspan="8" height="31" width="24" align="left" valign="bottom"><b><u>ПІБ ????</u></b></td>
        <td colspan="4" align="left" valign="bottom"><b><u>контактний телефон ????</u></b></td>
        <td align="left" valign="bottom"><b>Відповідальний</b></td>
        <td align="left" valign="middle">??????</td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td height="41" align="left" valign="bottom"><b>№</b></td>
        <td align="left" valign="bottom" style="font-family: TimesNewRoman, 'Times New Roman', Times, Baskerville, Georgia, serif;"><b>Прізвище</b></td>
        <td align="left" valign="bottom"><b>Ім'я</b></td>
        <td align="left" valign="bottom"><b>По-батькові</b></td>
        <td align="left" valign="bottom"><strong>вулиця</strong></td>
        <td align="left" valign="bottom"><strong>будинок</strong></td>
        <td align="left" valign="bottom"><strong>корпус</strong></td>
        <td align="left" valign="bottom"><strong>квартира</strong></td>
        <td align="left" valign="bottom"><strong>дата народження</strong></td>
        <td align="left" valign="bottom"><strong>телефон</strong></td>
        <td align="left" valign="bottom"><strong>кат</strong></td>
        <td align="right" valign="bottom"><strong>№посв</strong></td>
        <td align="left" valign="bottom"><strong><br></strong></td>
        <td align="left" valign="bottom"><strong>Статус</strong></td>
        <td align="left" valign="bottom" bgcolor="FFFF00"><strong>Акція</strong></td>
        <td align="left" valign="bottom"><strong>Коментар</strong></td>
        <td align="left" valign="bottom"><strong>Чорний список</strong></td>
    </tr>
    @if($citizens->count())
        @foreach($citizens as $citizen)
            @include('export.partials.citizens_item')
        @endforeach
    @endif
    <tr>
        <td colspan="12" height="33" align="left" valign="bottom"><b>Загальна кількість отримувачів ( людей)
                - {{$citizens->count()}}</b>
        </td>
        <td align="left" valign="bottom"><b><br></b></td>
        <td align="left" valign="bottom"><b><br></b></td>
        <td align="left" valign="bottom"><b><br></b></td>
        <td align="left" valign="bottom"><b><br></b></td>
        <td align="left" valign="bottom"><b><br></b></td>
    </tr>
    <tr>
        <td colspan="12" height="24" align="left" valign="bottom"><b>Загальна кількість отримувачів квартир(кількість
                квартир в яких отримують прод. набори) - {{$citizens->count()}}</b></td>
        <td align="left" valign="bottom"><b><br></b></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    </tbody>
</table>

<style>
</style>