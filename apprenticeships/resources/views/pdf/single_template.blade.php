<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: "Tinos";
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
        
        @php
            $firstActive = $actives->first();
        @endphp

        <p style="text-align: center; font-size: 21px;"><b>POROZUMIENIE</b></p>
        <br/>
        <p style="text-align: center; font-size: 16px;"><b>dotyczące organizacji praktyk programowych dla studentów Uniwersytetu Rzeszowskiego</b></p>
        <p style="text-align: center; font-size: 16px;"><b>zawarte w dniu {{ $generateDateFormatted }} r.</b></p>
        <br/>
        <p style="text-align: justify; font-size: 17px; text-align: justify;"><b>Uniwersytet Rzeszowski</b> w którego imieniu działa z upoważnienia Rektora</p>
        <p style="text-align: justify; font-size: 17px; text-align: justify;"><b>{{ $representative->name }}</b></p>
        <p style="text-align: justify; font-size: 17px; text-align: justify;">i</p>
        <p style="text-align: justify; font-size: 17px; text-align: justify;"><b>{{ $firstActive->company_name }}</b></p>
        <p style="text-align: justify; font-size: 17px; text-align: justify;">{{ $firstActive->company_address }}</p>
        <p style="text-align: justify; font-size: 17px; text-align: justify;">
            @if ($firstActive->company_form == 1)
            zwany
            @elseif ($firstActive->company_form == 2)
            zwana
            @else
            zwane
            @endif
            dalej „instytucją”, którą reprezentuje <b>{{ $firstActive->MrMs_company_person}} {{ $firstActive->company_person }} - {{ $firstActive->position}}</b></p>
        <p style="text-align: justify; font-size: 17px; text-align: justify;">zawarli na okres</p>
        <br/>
        <p style="text-align: center; font-size: 17px"><b>
            {{-- {{ $firstActive->start_date }} r. - {{ $firstActive->end_date }} r. --}}
            {{ \Carbon\Carbon::createFromFormat('Y-m-d', $firstActive->start_date)->format('d.m.Y') }} r. - {{ \Carbon\Carbon::createFromFormat('Y-m-d', $firstActive->end_date)->format('d.m.Y') }}r.
        </b></p>
        <br/>
        <p style="text-align: justify; font-size: 17px; text-align: justify;">porozumienie następującej treści:</p>
        <table>
            <tr>
                <td style="width: 1cm; vertical-align: top; font-size: 17px"><b>I.</b></td>
                <td style="font-size: 17px; text-align: justify;">Uniwersytet Rzeszowski kieruje do w/w instytucji studenta(ów) Kolegium Nauk <b>Przyrodniczych</b>, kierunek <b>{{ $firstActive->code->direction->name }}</b> w celu odbycia programowej praktyki zawodowej, według poniższego/dołączonego harmonogramu.</td>
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
            @foreach ($actives as $index => $active)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>Praktyka zawodowa</td>
                    <td>{{ $active->student_name }}</td>
                    <td>{{ $active->code->direction->name }}</td>
                    <td>{{ $active->code->year}}<br/>
                        {{ $active->code->degree}}<br/>
                        {{ $active->code->mode}}
                    </td>
                    <td>{{ $active->start_date}}<br/>
                        {{ $active->end_date}}
                    </td>
                </tr>
            @endforeach
        </table>
        <br/>
        <p style="text-align: justify; font-size: 16px; text-align: justify;">Praktyka w wymiarze <b>{{ $firstActive->hours }}</b> w w/w terminie wg indywidualnie ustalonego harmonogramu. Opiekunem praktyk będzie {{ $firstActive->MrMs_supervisor }} <b>{{ $firstActive->supervisor_name }}</b>.</p>
        <br/>
        <div class="page-break"></div>
        <table>
            <tr>
                <td style="width: 1cm; vertical-align: top; font-size: 17px"><b>II.</b></td>
                <td style="font-size: 17px; text-align: justify;">Uniwersytet zobowiązuje się do:<br/>
                    <table>
                        <tr>
                            <td style="width: 0.5cm; vertical-align: top; font-size: 17px">1)</td>
                            <td style="font-size: 17px; text-align: justify;">opracowania programu praktyk, <br/></td>
                        </tr>
                        <tr style="height: 0.5cm">
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 0.5cm; vertical-align: top; font-size: 17px">2)</td>
                            <td style="font-size: 17px; text-align: justify;">sprawowania nadzoru dydaktyczno – organizacyjnego nad przebiegiem praktyk,<br/></td>
                        </tr>
                        <tr style="height: 0.5cm">
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 0.5cm; vertical-align: top; font-size: 17px">3)</td>
                            <td style="font-size: 17px; text-align: justify;">poinformowania studentów o konieczności ubezpieczenia się od następstw nieszczęśliwych wypadków na okres praktyki oraz konieczności przedłożenia polisy w dniu rozpoczęcia praktyki.</td>
                        </tr>
                    </table>                   
                </td>
            </tr>
        </table>
        <br/><br/>
        <table>
            <tr>
                <td style="width: 1cm; vertical-align: top; font-size: 17px"><b>III.</b></td>
                <td style="font-size: 17px; text-align: justify;">Instytucja  zobowiązuje  się  do  zapewnienia  warunków  niezbędnych  do przeprowadzenia praktyki, a w szczególności:<br/>
                    <table>
                        <tr>
                            <td style="width: 0.5cm; vertical-align: top; font-size: 17px">1)</td>
                            <td style="font-size: 17px; text-align: justify;">zapewnienia odpowiednich stanowisk pracy, urządzeń i materiałów,<br/></td>
                        </tr>
                        <tr style="height: 0.5cm">
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 0.5cm; vertical-align: top; font-size: 17px">2)</td>
                            <td style="font-size: 17px; text-align: justify;">zapoznania studentów z zakładowym regulaminem pracy, przepisami o bezpieczeństwie <br/>i higienie pracy oraz o ochronie informacji niejawnych,<br/></td>
                        </tr>
                        <tr style="height: 0.5cm">
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 0.5cm; vertical-align: top; font-size: 17px">3)</td>
                            <td style="font-size: 17px; text-align: justify;">należytego wykonania obowiązków Administratora Danych Osobowych w rozumieniu Rozporządzenia Parlamentu Europejskiego i Rady (UE) 2016/679 z dnia 27 kwietnia 2016r. w sprawie ochrony osób fizycznych w związku z przetwarzaniem danych osobowych i w sprawie swobodnego przepływu takich danych oraz uchylenia dyrektywy 95/46/WE,<br/></td>
                        </tr>
                        <tr style="height: 0.5cm">
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 0.5cm; vertical-align: top; font-size: 17px">4)</td>
                            <td style="font-size: 17px; text-align: justify;">nadzoru nad wykonywaniem przez studentów zadań wynikających z programu praktyk,<br/></td>
                        </tr>
                        <tr style="height: 0.5cm">
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 0.5cm; vertical-align: top; font-size: 17px">5)</td>
                            <td style="font-size: 17px; text-align: justify;">umożliwienie opiekunom dydaktycznym wyznaczonym przez Uniwersytet sprawowania nadzoru dydaktycznego nad praktykami oraz kontroli tych praktyk.<br/></td>
                        </tr>
                    </table>                   
                </td>
            </tr>
        </table>
        <br/>
        <table>
            <tr>
                <td style="width: 1cm; vertical-align: top; font-size: 17px"><b>IV.</b></td>
                <td style="font-size: 17px; text-align: justify;">Strony zgodnie ustalają, że porozumienie ma charakter nieodpłatny.</td>
            </tr>
        </table>
        <br/>
        <table>
            <tr>
                <td style="width: 1cm; vertical-align: top; font-size: 17px"><b>V.</b></td>
                <td style="font-size: 17px; text-align: justify;">Porozumienie   sporządzono  w  dwóch   jednobrzmiących   egzemplarzach, po jednym dla każdej ze stron.
             </td>
            </tr>
        </table>
        <br/><br/>

        <table style="width: 100%;">
            <tr>
                <td style="text-align: center; width: 50%;">
                    <p style="font-size: 17px; margin: 0; padding: 0;">...............................................</p>
                    <p style="font-size: 11px; margin: 0; padding: 0;">(podpis Osoby reprezentującej Uniwersytet Rzeszowski)</p>
                </td>
                <td style="text-align: center; width: 50%;">
                    <p style="font-size: 17px; margin: 0; padding: 0;">...............................................</p>
                    <p style="font-size: 11px; margin: 0; padding: 0;">(podpis Osoby reprezentującej Instytucję)</p>
                </td>
            </tr>
        </table>

    </div>
    </body>
</html>