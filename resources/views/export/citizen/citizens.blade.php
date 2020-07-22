<table cellspacing="0" border="0">
    <tbody>
    <tr>
        <td height="41" align="left" valign="bottom"><b>№</b></td>
        <td align="left" valign="bottom" style="font-family: TimesNewRoman, 'Times New Roman', Times, Baskerville, Georgia, serif;"><b>Прізвище</b></td>
        <td align="left" valign="bottom"><b>Ім'я</b></td>
        <td align="left" valign="bottom"><b>По-батькові</b></td>
        <td align="left" valign="bottom"><strong>Адреса</strong></td>
        <td align="left" valign="bottom"><strong>Під'їзд</strong></td>
        <td align="left" valign="bottom"><strong>Поверх</strong></td>
        <td align="left" valign="bottom"><strong>Квартира</strong></td>
        <td align="left" valign="bottom"><strong>дата народження</strong></td>
        <td align="left" valign="bottom"><strong>телефон</strong></td>
        <td align="left" valign="bottom"><strong>кат</strong></td>
        <td align="right" valign="bottom"><strong>№посв</strong></td>
        <td align="left" valign="bottom"><strong><br></strong></td>
        <td align="left" valign="bottom"><strong>Статус</strong></td>
        <td align="left" valign="bottom" bgcolor="FFFF00"><strong>Акція</strong></td>
        <td align="left" valign="bottom"><strong>Коментар</strong></td>
        <td align="left" valign="bottom"><strong>Cписок</strong></td>
    </tr>
    @if($citizens->count())
        @foreach($citizens as $citizen)
            @include('export.citizen.item')
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
