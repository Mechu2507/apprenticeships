<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700&subset=latin-ext" type="text/css">
        <style>
            body {
                font-family: "Lato";
            }

            .page-break {
                page-break-after: always;
            }

            p {
                margin: 0px;
            }
        </style>
    </head>
    
    <body>
    <div class="container" > 
        @foreach ($actives as $index => $active)    
        <p style="text-align: center; font-size: 20px;"><b>POROZUMIENIE</b></p><br/>
        <br/>
        <p style="text-align: center; font-size: 15px;"><b>dotyczące organizacji praktyk programowych dla studentów Uniwersytetu Rzeszowskiego</b></p>
        <p style="text-align: center; font-size: 15px;"><b>zawarte w dniu {{ date('Y-m-d') }} r.</b></p>
        <br/>
        <p style="text-align: justify; font-size: 16px"><b>Uniwersytet Rzeszowski</b> w którego imieniu działa z upoważnienia Rektora</p>
        <p style="text-align: justify; font-size: 16px"><b>{{ $representative->name }}</b></p>
        <p style="text-align: justify; font-size: 16px">i</p>
        <p style="text-align: justify; font-size: 16px"><b>{{ $active->company_name }}</b></p>
        <p style="text-align: justify; font-size: 16px">{{ $active->company_address }}</p>
        <p style="text-align: justify; font-size: 16px">zwana dalej „instytucją”, którą reprezentuje <b>{{ $active->company_person }} - {{ $active->position}}</b></p>
        <p style="text-align: justify; font-size: 16px">zawarli na okres</p>
        <br/>
        <p style="text-align: center; font-size: 16px"><b>{{ $active->start_date }} r. - {{ $active->end_date }} r.</b></p>
        <br/>
        <p style="text-align: justify; font-size: 16px">porozumienie następującej treści:</p>
        <table>
            <tr>
                <td style="width: 1cm; vertical-align: top; font-size: 16px"><b>I.</b></td>
                <td style="font-size: 16px">Uniwersytet Rzeszowski kieruje do w/w instytucji studenta(ów) Kolegium Nauk <b>Przyrodniczych</b>, kierunek <b>{{ $active->code->direction->name }}</b> w celu odbycia programowej praktyki zawodowej, według poniższego/dołączonego harmonogramu.</td>
            </tr>
        </table>
        <br/>

        <table border="1" style="border-collapse: collapse; width: 100%; text-align: center; font-size:15px">
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
                <td>{{ $active->code->year}}<br/>
                    {{ $active->code->degree}}<br/>
                    {{ $active->code->mode}}
                </td>
                <td>Jw.</td>
            </tr>
        </table>
        <br/>
        <p style="text-align: justify; font-size: 16px">Praktyka w wymiarze <b>{{ $active->hours }}</b> w w/w terminie wg indywidualnie ustalonego harmonogramu. Opiekunem praktyk będzie <b>{{ $active->supervisor_name }}</b>.</p>
        <br/><br/>
        <div class="page-break"></div>
        <table>
            <tr>
                <td style="width: 1cm; vertical-align: top; font-size: 16px"><b>II.</b></td>
                <td style="font-size: 16px">Uniwersytet zobowiązuje się do:<br/>
                    <table>
                        <tr>
                            <td style="width: 0.5cm; vertical-align: top; font-size: 16px">1)</td>
                            <td style="font-size: 16px">opracowania programu praktyk, <br/></td>
                        </tr>
                        <tr style="height: 0.5cm">
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 0.5cm; vertical-align: top; font-size: 16px">2)</td>
                            <td style="font-size: 16px">sprawowania nadzoru dydaktyczno – wychowawczego oraz organizacyjnego nad przebiegiem praktyk,<br/></td>
                        </tr>
                        <tr style="height: 0.5cm">
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 0.5cm; vertical-align: top; font-size: 16px">3)</td>
                            <td style="font-size: 16px">poinformowania studentów o konieczności ubezpieczenia się od następstw nieszczęśliwych wypadków na okres praktyki oraz konieczności przedłożenia polisy w dniu rozpoczęcia praktyki.</td>
                        </tr>
                    </table>                   
                </td>
            </tr>
        </table>
        <br/><br/>
        <table>
            <tr>
                <td style="width: 1cm; vertical-align: top; font-size: 16px"><b>III.</b></td>
                <td style="font-size: 16px">Instytucja  zobowiązuje  się  do  zapewnienia  warunków  niezbędnych  do przeprowadzenia praktyki, a w szczególności:<br/>
                    <table>
                        <tr>
                            <td style="width: 0.5cm; vertical-align: top; font-size: 16px">1)</td>
                            <td style="font-size: 16px">zapewnienia odpowiednich stanowisk pracy, urządzeń i materiałów,<br/></td>
                        </tr>
                        <tr style="height: 0.5cm">
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 0.5cm; vertical-align: top; font-size: 16px">2)</td>
                            <td style="font-size: 16px">zapoznania studentów z zakładowym regulaminem pracy, przepisami o bezpieczeństwie i higienie pracy oraz o ochronie informacji niejawnych,<br/></td>
                        </tr>
                        <tr style="height: 0.5cm">
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 0.5cm; vertical-align: top; font-size: 16px">3)</td>
                            <td style="font-size: 16px">należytego wykonania obowiązków Administratora Danych Osobowych w rozumieniu Rozporządzenia Parlamentu Europejskiego i Rady (UE) 2016/679 z dnia 27 kwietnia 2016r. w sprawie ochrony osób fizycznych w związku z przetwarzaniem danych osobowych i w sprawie swobodnego przepływu takich danych oraz uchylenia dyrektywy 95/46/WE,<br/></td>
                        </tr>
                        <tr style="height: 0.5cm">
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 0.5cm; vertical-align: top; font-size: 16px">4)</td>
                            <td style="font-size: 16px">nadzoru nad wykonywaniem przez studentów zadań wynikających z programu praktyk,<br/></td>
                        </tr>
                        <tr style="height: 0.5cm">
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 0.5cm; vertical-align: top; font-size: 16px">5)</td>
                            <td style="font-size: 16px">umożliwienie opiekunom dydaktycznym wyznaczonym przez Uniwersytet sprawowania nadzoru dydaktycznego nad praktykami oraz kontroli tych praktyk.<br/></td>
                        </tr>
                    </table>                   
                </td>
            </tr>
        </table>
        <br/>
        <table>
            <tr>
                <td style="width: 1cm; vertical-align: top; font-size: 16px"><b>IV.</b></td>
                <td style="font-size: 16px">Strony zgodnie ustalają, że porozumienie ma charakter nieodpłatny.</td>
            </tr>
        </table>
        <br/>
        <table>
            <tr>
                <td style="width: 1cm; vertical-align: top; font-size: 16px"><b>V.</b></td>
                <td style="font-size: 16px">Porozumienie   sporządzono  w  dwóch   jednobrzmiących   egzemplarzach, po jednym dla każdej ze stron.
             </td>
            </tr>
        </table>
        <br/>

        <table style="width: 100%;">
            <tr>
                <td style="text-align: center; width: 50%;">
                    <p style="font-size: 16px; margin: 0; padding: 0;">...............................................</p>
                    <p style="font-size: 10px; margin: 0; padding: 0;">(podpis Osoby reprezentującej Uniwersytet Rzeszowski)</p>
                </td>
                <td style="text-align: center; width: 50%;">
                    <p style="font-size: 16px; margin: 0; padding: 0;">...............................................</p>
                    <p style="font-size: 10px; margin: 0; padding: 0;">(podpis Osoby reprezentującej Instytucję)</p>
                </td>
            </tr>
        </table>

        @if ($index < $actives->count() - 1)
        <div class="page-break"></div>
        @endif

        @endforeach
    </div>
    </body>
</html>