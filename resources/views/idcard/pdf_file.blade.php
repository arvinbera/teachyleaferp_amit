<div class="content px-3">
    <div class="card" style="font: 'Garamond';">

        <p style="font-size: 24px; text-transform: uppercase; font-weight: bold; text-align: center;">teachyLeaf</p>

        <div class="card-body">

            @foreach($idcard as $idcard)
            <div class="row" style="margin-bottom: 20px;">
                <div class="col-md-3" style="border: 1px solid #000; margin: 0 100px;">
                    <table border="0" width="100%">
                        <tbody>
                            <tr>
                                <td width="30%" style="padding: 10px;">
                                    <img src="./images/logo.png" style="height: 73px; width: 73px" />
                                </td>
                                <td width="40%" style="padding: 10px; text-align: center;">
                                    <h4 style="color: blue; margin-bottom: 5px; font-size: 20px;">teachyLeaf</h4>
                                    <hr>
                                    <p>Student Id Card</p>
                                </td>
                                <td width="30%" style="padding: 10px;">
                                    <img src="./images/profile_photos/{{$idcard['student']['profile_photo']}}" style="height: 73px; width: 73px" />
                                </td>
                            </tr>
                            <tr>
                                <td width="45%" style="padding: 0 10px;">
                                    <p>Name: <b>{{$idcard['student']['name']}}</b></p>
                                </td>
                                <td width="10%" style="padding: 0 10px; text-align: center;">
                                </td>
                                <td width="45%" style="padding: 0 10px;">
                                    <p>Id No: <b>{{$idcard['student']['id_no']}}</b></p>
                                </td>
                            </tr>
                            <tr>
                                <td width=33%" style="padding: 0 10px;">
                                    <p>Session: <b>{{$idcard['session']['name']}}</b></p>
                                </td>
                                <td width="33%" style="padding: 0 10px;">
                                    <p>Class: <b>{{$idcard['class']['name']}}</b></p>
                                </td>
                                <td width="45%" style="padding: 0 10px;">
                                    <p>Roll: <b>{{$idcard->roll_no}}</b></p>
                                </td>
                            </tr>
                            <tr style="margin-bottom: 0; padding: 0;">
                                <td width=33%" style="padding: 0;">
                                </td>
                                <td width="33%" style="padding: 0;">
                                </td>
                                <td width="45%" style="padding: 0;">
                                    <p>____________________</p>
                                </td>
                            </tr>
                            <tr style="margin-top: 0; padding: 0;">
                                <td width=33%" style="padding: 0 10px;">
                                </td>
                                <td width="33%" style="padding: 0 10px;">
                                </td>
                                <td width="45%" style="padding: 0 10px;">
                                    <p>Principal's Signature</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <br style="clear:both;">
    <br>
    <hr style="border: dashed;">
</div>