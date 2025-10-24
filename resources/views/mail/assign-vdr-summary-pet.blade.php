<!DOCTYPE html><html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
   <head>
      <title> </title>
      
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />

      <style type="text/css">
         #outlook a {
            padding: 0;
         }
      
         body {
            margin: 0;
            padding: 0;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
         }
      
         table,
         td {
            border-collapse: collapse;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
         }
      
         img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
         }
      
         p {
            display: block;
            margin: 13px 0;
         }
      </style>
      <style type="text/css">
         @media only screen and (min-width:480px) {
            .mj-column-per-100 {
               width: 100% !important;
               max-width: 100%;
            }
         }
      </style>
      <style type="text/css">
         @media only screen and (max-width:480px) {
            table.mj-full-width-mobile {
               width: 100% !important;
            }
      
            td.mj-full-width-mobile {
               width: auto !important;
            }
         }
      </style>
      <style type="text/css">
         a,
         span,
         td,
         th {
            -webkit-font-smoothing: antialiased !important;
            -moz-osx-font-smoothing: grayscale !important;
         }
      </style>

   </head>
 
   <body style="background-color:#ffffff;">
      <div style="background-color:#ffffff;">
         <div style="margin:0px auto;max-width:600px;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
               <tbody>
                  <tr>
                     <td style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:0px;text-align:center;">
                        <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                           <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                              <tbody>
                                 <tr>
                                    <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                       <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px;">
                                          <tbody>
                                             <tr>
                                                <td style="width:180px;">
                                                   <img alt="image description" height="auto" src="{{asset('img/draw/happy-2.png')}}" style="border:0;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:14px;" width="50" />
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                       <div style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:400;line-height:24px;text-align:left;color:#434245;">
                                          <h1 style="margin: 0; font-size: 24px; line-height: normal; font-weight: bold;"> {{$data['subject']}} </h1>
                                       </div>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>

         <div style="margin:0px auto;max-width:600px;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
               <tbody>
                  <tr>
                     <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;">
                        <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                           <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                              <tbody>
                                 <tr>
                                    <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                       <div style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:400;line-height:24px;text-align:left;color:#434245;">
                                          <p style="margin: 0;">Hi, {{$data['to']}}</p>
                                       </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                       <div style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:400;line-height:24px;text-align:left;color:#434245;">
                                          <p style="margin: 0;">You have a {{$data['subject']}} from {{$data['from']}}. {{$data['body']}}</p>
                                       </div>
                                       {{-- <div style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:400;line-height:24px;text-align:left;color:#434245;">
                                          <br>
                                          <p style="margin: 0;">{{$data['body']}}.</p>
                                       </div> --}}
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>

         <div style="background:#ffffff;background-color:#ffffff;margin:0px auto;border-radius:4px;max-width:600px;">
            <table style="width:100%; border-collapse: collapse; font-family: Arial, sans-serif;">
               <thead>
                  <tr>
                     <th  style="background-color:#f2f2f2; border:1px solid #ddd; padding:8px; text-align:left;">Menunggu Validasi</th>
                     <th colspan="2" style="background-color:#f2f2f2; border:1px solid #ddd; padding:8px; text-align:left;">{{count($data['vdrs'])}}</th>
                  </tr>
                  <tr>
                     <th  style="background-color:#f2f2f2; border:1px solid #ddd; padding:8px; text-align:left;">Rejected</th>
                     <th colspan="2" style="background-color:#f2f2f2; border:1px solid #ddd; padding:8px; text-align:left;">{{count($data['vdrRejectPets'])}}</th>
                  </tr>
                  <tr>
                     <th  style="background-color:#f2f2f2; border:1px solid #ddd; padding:8px; text-align:left;">Complete</th>
                     <th colspan="2" style="background-color:#f2f2f2; border:1px solid #ddd; padding:8px; text-align:left;">{{count($data['vdrCompletes'])}}</th>
                  </tr>
                 <tr>
                   <th style="background-color:#f2f2f2; border:1px solid #ddd; padding:8px; text-align:left;">VDR ID</th>
                   {{-- <th style="background-color:#f2f2f2; border:1px solid #ddd; padding:8px; text-align:left;">Nama Kapal</th> --}}
                   <th style="background-color:#f2f2f2; border:1px solid #ddd; padding:8px; text-align:left;">Release Date</th>
                   <th style="background-color:#f2f2f2; border:1px solid #ddd; padding:8px; text-align:left;">Action</th>
                 </tr>
               </thead>
               <tbody>
                  @foreach ($data['vdrs'] as $vdr)
                  <tr>
                     <td style="border:1px solid #ddd; padding:8px;">{{$vdr->code}}</td>
                     {{-- <td style="border:1px solid #ddd; padding:8px;">{{$vdr->vessel->name}}</td> --}}
                     <td style="border:1px solid #ddd; padding:8px;">{{formatDate($vdr->release_date)}}</td>
                     <td style="border:1px solid #ddd; padding:8px; ">
                        @foreach ($data['links'] as $link)
                            @if ($link->id == $vdr->id)
                              <a href="{{$link->link}}"
                                 style="background-color:#007bff; color:#fff; padding:5px 10px; text-decoration:none; 
                                       border-radius:5px; display:inline-block; font-family:Arial, sans-serif; font-size:10px;">
                                 Open VDR
                              </a>
                            @endif
                        @endforeach
                        {{-- <a href="{{route('vdr.pdf.email', [enkripRambo($vdr->id), enkripRambo('pet')])}}"
                              style="background-color:#007bff; color:#fff; padding:5px 10px; text-decoration:none; 
                                    border-radius:5px; display:inline-block; font-family:Arial, sans-serif; font-size:10px;">
                              Open VDR
                           </a> --}}

                     </td>
                  </tr>
                  @endforeach
                 {{-- <tr>
                   <td style="border:1px solid #ddd; padding:8px;">1</td>
                   <td style="border:1px solid #ddd; padding:8px;">MT Pertamina Gas</td>
                   <td style="border:1px solid #ddd; padding:8px;">2233.5 Jam</td>
                   <td style="border:1px solid #ddd; padding:8px; color:green;">Approved</td>
                 </tr>
                 <tr>
                   <td style="border:1px solid #ddd; padding:8px;">2</td>
                   <td style="border:1px solid #ddd; padding:8px;">MT Patra Ocean</td>
                   <td style="border:1px solid #ddd; padding:8px;">1987.2 Jam</td>
                   <td style="border:1px solid #ddd; padding:8px; color:orange;">Pending</td>
                 </tr> --}}
               </tbody>
            </table>
             
            
            {{-- <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#BFFCFD;background-color:#BFFCFD;width:100%;border-radius:4px;">
               <tbody>
                  

                  <tr>
                     <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;">
                        <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                           <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                              <tbody>
                                 <tr>
                                    <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                       <div style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:bold;line-height:24px;text-align:left;color:#2149fa;">
                                          
                                          <h2 style="margin: 0; font-size: 24px; font-weight: bold; line-height: 24px;">code</h2>
                                       </div>
                                    </td>
                                 </tr>
                                 
                                 <tr>
                                    <td align="right" vertical-align="middle" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                       <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:separate;line-height:100%;">
                                          <tbody>
                                             <tr>
                                                <td align="center"  role="presentation" style="border:none;border-radius:30px;cursor:auto;mso-padding-alt:10px 25px;" valign="middle">
                                                   
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </td>
                  </tr>
               </tbody>
            </table> --}}
         </div>
         
         
         <div style="margin:0px auto;max-width:600px;margin-top:80px">
            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
               <tbody>
                  <tr>
                     <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;">
                        <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                           <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                              <tbody>
                                 <tr>
                                    <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                       <div style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:400;line-height:24px;text-align:left;color:#434245;">If you need any help, don’t hesitate to reach out to us at <a href="#" style="color: #2e58ff; text-decoration: none;">develop@ekanuri.com</a>!</div>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
         <div style="margin:0px auto;max-width:600px;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
               <tbody>
                  <tr>
                     <td style="direction:ltr;font-size:0px;padding:20px 0;padding-top:0;text-align:center;">
                        <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                           <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                              <tbody>
                                 <tr>
                                    <td style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                       <p style="border-top: dashed 1px lightgrey; font-size: 1px; margin: 0px auto; width: 100%;">
                                       </p>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                       <div style="font-family:Helvetica, Arial, sans-serif;font-size:14px;font-weight:400;line-height:24px;text-align:left;color:#999999;">DSP-PHE Developer Team</div>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
   </body>
</html>