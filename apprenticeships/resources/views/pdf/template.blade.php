<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style>
            body {
                /* font-family: 'Times New Roman', Times, serif; */
                /* font-family: DejaVu Sans; */
                font-family: TimesNewRoman, serif;
            }

            .page-break {
                page-break-after: always;
            }
        </style>
    </head>
    <body>
    <div class="container" > 
        @foreach ($actives as $active)    
        <p style="text-align: center; font-size: 21px;"><b>POROZUMIENIE</b></p>
        <p style="text-align: center; font-size: 16px;"><b>dotyczące organizacji praktyk programowych dla studentów Uniwersytetu Rzeszowskiego</b></p>
        <p style="text-align: center; font-size: 16px;"><b>zawarte w dniu {{ date('Y-m-d') }} r.</b></p>
        <br/>
        <p style="text-align: justify; font-size: 17px"><b>Uniwersytet Rzeszowski</b> w którego imieniu działa z upoważnienia Rektora</p>
        <p style="text-align: justify; font-size: 17px"><b>REPREZENTANT UR</b></p>
        <p style="text-align: justify; font-size: 17px">i</p>
        <p style="text-align: justify; font-size: 17px"><b>{{ $active->company_name }}</b></p>
        <p style="text-align: justify; font-size: 17px">{{ $active->company_address }}</p>
        <p style="text-align: justify; font-size: 17px">zwana dalej „instytucją”, którą reprezentuje <b>{{ $active->company_person }} - {{ $active->position}}</b></p>
        <br/>
        <p style="text-align: justify; font-size: 17px">zawarli na okres</p>
        <p style="text-align: center; font-size: 17px"><b>{{ $active->start_date }} r. - {{ $active->end_date }} r.</b></p>
        <br/>
        <p style="text-align: justify; font-size: 17px">porozumienie następującej treści:</p>
        <br/>
        <table>
            <tr>
                <td style="width: 1cm; vertical-align: top; font-size: 17px"><b>I.</b></td>
                <td style="font-size: 17px">Uniwersytet Rzeszowski kieruje do w/w instytucji studenta(ów) <b>KOLEGIUM</b>, kierunek <b>{{ $active->code->direction->name }}</b> w celu odbycia programowej praktyki zawodowej, według poniższego/dołączonego harmonogramu.</td>
            </tr>
        </table>
        <br/>

        <table border="1" style="border-collapse: collapse; width: 100%; text-align: center; font-size:16px">
            <tr style="height: 0.9cm">
                <td style="width: 1cm">Lp.</td>
                <td style="width: 3cm">Nazwa praktyki</td>
                <td style="width: 4cm">Nazwisko i Imię</td>
                <td style="width: 3cm">Kierunek studiów</td>
                <td style="width: 3.6cm">Rok studiów</td>
                <td style="width: 3cm">Termin praktyki</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Praktyka zawodowa</td>
                <td>{{ $active->student_name }}</td>
                <td>{{ $active->code->direction->name }}</td>
                <td>3</td>
                <td>Jw.</td>
            </tr>
        </table>
        <br/>
        <p style="text-align: justify; font-size: 16px"><i>Praktyka w wymiarze <b>{{ $active->hours }}</b> w w/w terminie wg indywidualnie ustalonego harmonogramu. Opiekunem praktyk będzie <b>{{ $active->supervisor_name }}</b>.</i></p>
        <br/><br/>
        <div class="page-break"></div>
        <table>
            <tr>
                <td style="width: 1cm; vertical-align: top; font-size: 17px"><b>II.</b></td>
                <td style="font-size: 17px">Uniwersytet zobowiązuje się do:<br/>
                    <table>
                        <tr>
                            <td style="width: 0.5cm; vertical-align: top; font-size: 17px">1)</td>
                            <td style="font-size: 17px">opracowania programu praktyk, <br/></td>
                        </tr>
                        <tr style="height: 0.5cm">
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 0.5cm; vertical-align: top; font-size: 17px">2)</td>
                            <td style="font-size: 17px">sprawowania nadzoru dydaktyczno – wychowawczego oraz organizacyjnego nad przebiegiem praktyk,<br/></td>
                        </tr>
                        <tr style="height: 0.5cm">
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 0.5cm; vertical-align: top; font-size: 17px">3)</td>
                            <td style="font-size: 17px">poinformowania studentów o konieczności ubezpieczenia się od następstw nieszczęśliwych wypadków na okres praktyki oraz konieczności przedłożenia polisy w dniu rozpoczęcia praktyki.</td>
                        </tr>
                    </table>                   
                </td>
            </tr>
        </table>
        <br/><br/>
        <table>
            <tr>
                <td style="width: 1cm; vertical-align: top; font-size: 17px"><b>III.</b></td>
                <td style="font-size: 17px">Instytucja  zobowiązuje  się  do  zapewnienia  warunków  niezbędnych  do przeprowadzenia praktyki, a w szczególności:<br/>
                    <table>
                        <tr>
                            <td style="width: 0.5cm; vertical-align: top; font-size: 17px">1)</td>
                            <td style="font-size: 17px">zapewnienia odpowiednich stanowisk pracy, urządzeń i materiałów,<br/></td>
                        </tr>
                        <tr style="height: 0.5cm">
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 0.5cm; vertical-align: top; font-size: 17px">2)</td>
                            <td style="font-size: 17px">zapoznania studentów z zakładowym regulaminem pracy, przepisami o bezpieczeństwie i higienie pracy oraz o ochronie informacji niejawnych,<br/></td>
                        </tr>
                        <tr style="height: 0.5cm">
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 0.5cm; vertical-align: top; font-size: 17px">3)</td>
                            <td style="font-size: 17px">należytego wykonania obowiązków Administratora Danych Osobowych w rozumieniu Rozporządzenia Parlamentu Europejskiego i Rady (UE) 2016/679 z dnia 27 kwietnia 2016r. w sprawie ochrony osób fizycznych w związku z przetwarzaniem danych osobowych i w sprawie swobodnego przepływu takich danych oraz uchylenia dyrektywy 95/46/WE,<br/></td>
                        </tr>
                        <tr style="height: 0.5cm">
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 0.5cm; vertical-align: top; font-size: 17px">4)</td>
                            <td style="font-size: 17px">nadzoru nad wykonywaniem przez studentów zadań wynikających z programu praktyk,<br/></td>
                        </tr>
                        <tr style="height: 0.5cm">
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 0.5cm; vertical-align: top; font-size: 17px">5)</td>
                            <td style="font-size: 17px">umożliwienie opiekunom dydaktycznym wyznaczonym przez Uniwersytet sprawowania nadzoru dydaktycznego nad praktykami oraz kontroli tych praktyk.<br/></td>
                        </tr>
                    </table>                   
                </td>
            </tr>
        </table>
        <br/>
        <table>
            <tr>
                <td style="width: 1cm; vertical-align: top; font-size: 17px"><b>IV.</b></td>
                <td style="font-size: 17px">Strony zgodnie ustalają, że porozumienie ma charakter nieodpłatny.</td>
            </tr>
        </table>
        <br/>
        <table>
            <tr>
                <td style="width: 1cm; vertical-align: top; font-size: 17px"><b>V.</b></td>
                <td style="font-size: 17px">Porozumienie   sporządzono  w  dwóch   jednobrzmiących   egzemplarzach, po jednym dla każdej ze stron.
             </td>
            </tr>
        </table>
        <br/><br/>
        <div style="justify-content: space-between; display: flex">
            <div style="text-align: center; width: 40%">
                <p style="font-size: 17px; margin: 0; padding: 0;">...............................................</p>
                <p style="font-size: 11px; margin: 0; padding: 0;">(podpis Osoby reprezentującej Uniwersytet Rzeszowski)</p>
            </div>
            <div style="text-align: center; width: 40%">
                <p style="font-size: 17px; margin: 0; padding: 0;">...............................................</p>
                <p style="font-size: 11px; margin: 0; padding: 0;">(podpis Osoby reprezentującej Instytucję) </p>
            </div>
        </div>
        <div class="page-break"></div>
        @endforeach
    </div>
    </body>
</html>