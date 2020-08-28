<?php
function GenerateBaseUrl()
{

    $GoogleCountryDomain = array(
        "google.com",
        "google.ac",
        "google.ad",
        "google.ae",
        "google.com.af",
        "google.com.ag",
        "google.com.ai",
        "google.al",
        "google.am",
        "google.co.ao",
        "google.com.ar",
        "google.as",
        "google.at",
        "google.com.au",
        "google.az",
        "google.ba",
        "google.com.bd",
        "google.be",
        "google.bf",
        "google.bg",
        "google.com.bh",
        "google.bi",
        "google.bj",
        "google.com.bn",
        "google.com.bo",
        "google.com.br",
        "google.bs",
        "google.bt",
        "google.co.bw",
        "google.by",
        "google.com.bz",
        "google.ca",
        "google.com.kh",
        "google.cc",
        "google.cd",
        "google.cf",
        "google.cat",
        "google.cg",
        "google.ch",
        "google.ci",
        "google.co.ck",
        "google.cl",
        "google.cm",
        "google.cn",
        "google.com.co",
        "google.co.cr",
        "google.com.cu",
        "google.cv",
        "google.com.cy",
        "google.cz",
        "google.de",
        "google.dj",
        "google.dk",
        "google.dm",
        "google.com.do",
        "google.dz",
        "google.com.ec",
        "google.ee",
        "google.com.eg",
        "google.es",
        "google.com.et",
        "google.fi",
        "google.com.fj",
        "google.fm",
        "google.fr",
        "google.ga",
        "google.ge",
        "google.gf",
        "google.gg",
        "google.com.gh",
        "google.com.gi",
        "google.gl",
        "google.gm",
        "google.gp",
        "google.gr",
        "google.com.gt",
        "google.gy",
        "google.com.hk",
        "google.hn",
        "google.hr",
        "google.ht",
        "google.hu",
        "google.co.id",
        "google.iq",
        "google.ie",
        "google.co.il",
        "google.im",
        "google.co.in",
        "google.io",
        "google.is",
        "google.it",
        "google.je",
        "google.com.jm",
        "google.jo",
        "google.co.jp",
        "google.co.ke",
        "google.ki",
        "google.kg",
        "google.co.kr",
        "google.com.kw",
        "google.kz",
        "google.la",
        "google.com.lb",
        "google.com.lc",
        "google.li",
        "google.lk",
        "google.co.ls",
        "google.lt",
        "google.lu",
        "google.lv",
        "google.com.ly",
        "google.co.ma",
        "google.md",
        "google.me",
        "google.mg",
        "google.mk",
        "google.ml",
        "google.com.mm",
        "google.mn",
        "google.ms",
        "google.com.mt",
        "google.mu",
        "google.mv",
        "google.mw",
        "google.com.mx",
        "google.com.my",
        "google.co.mz",
        "google.com.na",
        "google.ne",
        "google.com.nf",
        "google.com.ng",
        "google.com.ni",
        "google.nl",
        "google.no",
        "google.com.np",
        "google.nr",
        "google.nu",
        "google.co.nz",
        "google.com.om",
        "google.com.pk",
        "google.com.pa",
        "google.com.pe",
        "google.com.ph",
        "google.pl",
        "google.com.pg",
        "google.pn",
        "google.com.pr",
        "google.ps",
        "google.pt",
        "google.com.py",
        "google.com.qa",
        "google.ro",
        "google.rs",
        "google.ru",
        "google.rw",
        "google.com.sa",
        "google.com.sb",
        "google.sc",
        "google.se",
        "google.com.sg",
        "google.sh",
        "google.si",
        "google.sk",
        "google.com.sl",
        "google.sn",
        "google.sm",
        "google.so",
        "google.st",
        "google.sr",
        "google.com.sv",
        "google.td",
        "google.tg",
        "google.co.th",
        "google.com.tj",
        "google.tk",
        "google.tl",
        "google.tm",
        "google.to",
        "google.tn",
        "google.com.tr",
        "google.tt",
        "google.com.tw",
        "google.co.tz",
        "google.com.ua",
        "google.co.ug",
        "google.co.uk",
        "google.com.uy",
        "google.co.uz",
        "google.com.vc",
        "google.co.ve",
        "google.vg",
        "google.co.vi",
        "google.com.vn",
        "google.vu",
        "google.ws",
        "google.co.za",
        "google.co.zm",
        "google.co.zw"
    );
    shuffle($GoogleCountryDomain);
    $min = 0;
    $max = count($GoogleCountryDomain);
    $RandArr = rand($min, $max);
    return 'https://' . $GoogleCountryDomain[$RandArr] . '/';
}

function CurL($Url)
{

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => GenerateBaseUrl() . $Url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "gzip,deflate",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "User-Agent: Googlebot/2.1 (+http://www.google.com/bot.html)"
        ) ,
    ));
    $response = curl_exec($curl);
    curl_close($curl);

    return $response;
}
function QueryChecker($qc)
{
    $MatchLatLong = '/(\-?\d+(\.\d+)?),\s*(\-?\d+(\.\d+)?)$/';
    if (preg_match($MatchLatLong, $qc, $start))
    {
        $trim = explode(",", $start[0]);
        $StartDirections = LatLongToAddres($trim[0], $trim[1]);
        $QueryChecker = $StartDirections;
    }
    else
    {
        $QueryChecker = $qc;
    };
    return $QueryChecker;
}

function LatLongToAddres($lat, $long)
{
    $request = "maps/search/$lat,+$long";
    $Response = CurL($request);
    // Start Get String Between
    $BeforeText = '[[[1,[[\"';
    $AfterText = '\"]';
    $Text = ' ' . $Response;
    $This = strpos($Text, $BeforeText);
    if ($This == 0) return '';
    $This += strlen($BeforeText);
    $RangeText = strpos($Text, $AfterText, $This) - $This;
    $ResultAddress = substr($Text, $This, $RangeText);
    // End Get String Between
    return $ResultAddress;
};

function AddresToLatLong($address)
{
    $request = "search?tbm=map&authuser=0&hl=id&gl=id&pb=!4m12!1m3!1d7!2d0!3d0!2m3!1f0!2f0!3f0!3m2!1i1536!2i344!4f13.1!7i20!10b1!12m8!1m1!18b1!2m3!5m1!6e2!20e3!10b1!16b1!19m4!2m3!1i360!2i120!4i8!20m57!2m2!1i203!2i100!3m2!2i4!5b1!6m6!1m2!1i86!2i86!1m2!1i408!2i240!7m42!1m3!1e1!2b0!3e3!1m3!1e2!2b1!3e2!1m3!1e2!2b0!3e3!1m3!1e3!2b0!3e3!1m3!1e8!2b0!3e3!1m3!1e3!2b1!3e2!1m3!1e9!2b1!3e2!1m3!1e10!2b0!3e3!1m3!1e10!2b1!3e2!1m3!1e10!2b0!3e4!2b1!4b1!9b0!22m6!1stWBHX8vgLajbz7sP-vC46As%3A1!2s1i%3A0%2Ct%3A11886%2Cp%3AtWBHX8vgLajbz7sP-vC46As%3A1!7e81!12e5!17stWBHX8vgLajbz7sP-vC46As%3A584!18e15!24m50!1m13!13m6!2b1!3b1!4b1!6i1!8b1!9b1!18m5!3b1!4b1!5b1!6b1!9b1!2b1!5m5!2b1!3b1!5b1!6b1!7b1!10m1!8e3!14m1!3b1!17b1!20m4!1e3!1e6!1e14!1e15!21e2!24b1!25b1!26b1!30m1!2b1!36b1!43b1!52b1!55b1!56m2!1b1!3b1!65m5!3m4!1m3!1m2!1i224!2i298!26m4!2m3!1i80!2i92!4i8!30m28!1m6!1m2!1i0!2i0!2m2!1i458!2i344!1m6!1m2!1i1486!2i0!2m2!1i1536!2i344!1m6!1m2!1i0!2i0!2m2!1i1536!2i20!1m6!1m2!1i0!2i324!2m2!1i1536!2i344!34m14!2b1!3b1!4b1!6b1!8m4!1b1!3b1!4b1!6b1!9b1!12b1!14b1!20b1!23b1!37m1!1e81!42b1!47m0!49m1!3b1!50m4!2e2!3m2!1b1!3b1!65m0&q=" . urlencode($address) . "&oq=" . urlencode($address) . "&gs_l=maps.3..38i427k1j38i426k1l2j38i427k1.12303654.12315445.7.12334216.32.31.0.0.0.0.192.2696.0j21.25.0....0...1ac.1.64.maps..7.25.3592.3..38i39k1j38i69i445k1j38i69i429k1j38i69i376k1j38i69i444k1j38i39i111i428k1j38i39i128i429k1j38i39i111i427k1j38i69i427k1j38i39i129i429k1j38i377i430i427k1.54.&tch=1&ech=11&psi=tWBHX8vgLajbz7sP-vC46As.1598513332780.1";
    $Response = CurL($request);
    $hasil = json_decode(str_replace(['/*""*/', ")]}'"], ['', ''], $Response) , true);
    $vla = json_decode($hasil['d'], true);
    $count = count($vla[0][1][0]);

    if($count == 11){
      $lat = $vla[0][1][1][14][9][2];
      $lng = $vla[0][1][1][14][9][3];
      $address = $vla[0][1][1][14][18];
    }else{
      $lat = $vla[0][1][0][14][9][2];
      $lng = $vla[0][1][0][14][9][3];
      $address = $vla[0][1][0][14][18];
    }
      
    $Results[] = array(
        'request_address' => $vla[0][0],
        'formated_address' => $address,
        'lat' =>  $lat,
        'lng' => $lng,
    );

    return json_encode($Results);
};

function PlacePredictions($PlaceName)
{
    $request = "s?tbm=map&gs_ri=maps&suggest=p&authuser=0&hl=id&gl=id&pb=!2i5!4m12!1m3!1d2509.853377903053!2d0!3d-0!2m3!1f0!2f0!3f0!3m2!1i1536!2i486!4f13.1!7i20!10b1!12m8!1m1!18b1!2m3!5m1!6e2!20e3!10b1!16b1!19m4!2m3!1i360!2i120!4i8!20m57!2m2!1i203!2i100!3m2!2i4!5b1!6m6!1m2!1i86!2i86!1m2!1i408!2i240!7m42!1m3!1e1!2b0!3e3!1m3!1e2!2b1!3e2!1m3!1e2!2b0!3e3!1m3!1e3!2b0!3e3!1m3!1e8!2b0!3e3!1m3!1e3!2b1!3e2!1m3!1e9!2b1!3e2!1m3!1e10!2b0!3e3!1m3!1e10!2b1!3e2!1m3!1e10!2b0!3e4!2b1!4b1!9b0!22m3!1sUkolX4HSJI7t9QPKpIyoAg!3b1!7e81!23m2!4b1!10b1!24m49!1m12!13m6!2b1!3b1!4b1!6i1!8b1!9b1!18m4!3b1!4b1!5b1!6b1!2b1!5m5!2b1!3b1!5b1!6b1!7b1!10m1!8e3!14m1!3b1!17b1!20m4!1e3!1e6!1e14!1e15!21e2!24b1!25b1!26b1!30m1!2b1!36b1!43b1!52b1!55b1!56m2!1b1!3b1!65m5!3m4!1m3!1m2!1i224!2i298!26m4!2m3!1i80!2i92!4i8!34m14!2b1!3b1!4b1!6b1!8m4!1b1!3b1!4b1!6b1!9b1!12b1!14b1!20b1!23b1!37m1!1e81!47m0!49m1!3b1!65m0&q=" . urlencode($PlaceName) . "&pf=t&tch=1";
    $response = CurL($request);
    $hasil = json_decode(str_replace(['/*""*/', ")]}'"], ['', ''], $response) , true);
    $vla = $hasil['d'];
    $decode = json_decode($vla, true);
    $DataLength = count($decode[0][1]);
    for ($i = 0;$i < $DataLength;$i++)
    {
        $tes[] = array(
            'location_name' => $decode[0][1][$i][22][0][0],
            'latitude' => $decode[0][1][$i][22][11][2],
            'longlatitude' => $decode[0][1][$i][22][11][3],
        );
    };
    return json_encode($tes);
}

function PlaceDetails($querys)
{
    $queryPlaceDetails = urlencode($querys);
    $request = "search?tbm=map&authuser=0&pb=!4m12!1m3!1d0!2d0!3d0!2m3!1f0!2f0!3f0!3m2!1i1536!2i486!4f13.1!7i20!10b1!12m8!1m1!18b1!2m3!5m1!6e2!20e3!10b1!16b1!19m4!2m3!1i360!2i120!4i8!20m57!2m2!1i203!2i100!3m2!2i4!5b1!6m6!1m2!1i86!2i86!1m2!1i408!2i240!7m42!1m3!1e1!2b0!3e3!1m3!1e2!2b1!3e2!1m3!1e2!2b0!3e3!1m3!1e3!2b0!3e3!1m3!1e8!2b0!3e3!1m3!1e3!2b1!3e2!1m3!1e9!2b1!3e2!1m3!1e10!2b0!3e3!1m3!1e10!2b1!3e2!1m3!1e10!2b0!3e4!2b1!4b1!9b0!22m6!1saHomX5XPM6WEmgf_qIa4BQ%253A692!2zMWk6MSx0OjExODg3LGU6MCxwOmFIb21YNVhQTTZXRW1nZl9xSWE0QlE6Njky!7e81!12e3!17saHomX5XPM6WEmgf_qIa4BQ%253A955!18e15!24m49!1m12!13m6!2b1!3b1!4b1!6i1!8b1!9b1!18m4!3b1!4b1!5b1!6b1!2b1!5m5!2b1!3b1!5b1!6b1!7b1!10m1!8e3!14m1!3b1!17b1!20m4!1e3!1e6!1e14!1e15!21e2!24b1!25b1!26b1!30m1!2b1!36b1!43b1!52b1!55b1!56m2!1b1!3b1!65m5!3m4!1m3!1m2!1i224!2i298!26m4!2m3!1i80!2i92!4i8!30m28!1m6!1m2!1i0!2i0!2m2!1i458!2i486!1m6!1m2!1i1486!2i0!2m2!1i1536!2i486!1m6!1m2!1i0!2i0!2m2!1i1536!2i20!1m6!1m2!1i0!2i466!2m2!1i1536!2i486!34m14!2b1!3b1!4b1!6b1!8m4!1b1!3b1!4b1!6b1!9b1!12b1!14b1!20b1!23b1!37m1!1e81!42b1!47m0!49m1!3b1!50m4!2e2!3m2!1b1!3b1!65m0&q=$queryPlaceDetails&oq=$queryPlaceDetails&tch=1&ech=7&hl=en&gl=en";
    $response = CurL($request);
    //$hasil = json_decode(str_replace(['\n', '/*""*/', ")]}'"], ['', '', ''], $response) , true);
    $hasil = json_decode(str_replace(['/*""*/', ")]}'"], ['', ''], $response) , true);

    $decode = json_decode($hasil['d'], true);

    $CheckDataLength = count($decode[0][1]);

    if ($CheckDataLength == 1)
    {
        $DataLength = count($decode[0][1]);
        $iStart = 0;
    }
    else
    {
        $DataLength = count($decode[0][1]) - 1;
        $iStart = 1;
    }

    for ($i = $iStart;$i < $DataLength;$i++)
    {
        if ($decode[0][1][$i][14][7][1] == null)
        {
            $website = $decode[0][1][$i][14][7][1];
        }
        else
        {
            $website = '//' . $decode[0][1][$i][14][7][1];
        };

        $rowReviews = (json_encode($decode[0][1][$i][14][31][1]));

        //check reviews details
        if (json_decode(json_encode($decode[0][1][$i][14][31][1])) == null)
        {
            $rowReviewsCheck = json_decode(json_encode($decode[0][1][$i][14][52][13][0]));
        }
        else
        {
            $rowReviewsCheck = json_decode(json_encode($decode[0][1][$i][14][31][1]));
        }
        if (json_decode(json_encode($decode[0][1][$i][14][34][1])) == null)
        {
            $OpeningDayCheck = "OPEN_24_HOUR";
        }
        else
        {
            $OpeningDayChecks = json_decode(json_encode($decode[0][1][$i][14][34][1]));
            $OpeningDayCheck = $OpeningDayChecks;
        }

        //end check reviews details
        $Latlong[] = array(
            'place_name' => $decode[0][1][$i][14][11],
            'formatted_address' => $decode[0][1][$i][14][18],
            'website' => $website,
            'local_number' => $decode[0][1][$i][14][178][0][0],
            'international_number' => $decode[0][1][$i][14][178][0][3],
            'place_id' => $decode[0][1][$i][14][78],
            'time_zone' => $decode[0][1][$i][14][30],
            'lat' => $decode[0][1][$i][14][9][2],
            'lng' => $decode[0][1][$i][14][9][3],
            'rating' => $decode[0][1][$i][14][4][7],
            'place_type' => json_decode(json_encode($decode[0][1][$i][14][13])) ,
            'reviews_count' => $decode[0][1][$i][14][4][8],
            'review_details' => $rowReviewsCheck,
            'price_service' => json_decode(json_encode($decode[0][1][$i][14][35])) ,
            'place_photo' => json_decode(json_encode($decode[0][1][$i][14][171][0][0])) ,
            'opening_day' => $OpeningDayCheck,
        );
    };
    $tess['results'] = array(
        'candidates' => $Latlong,
    );
    return json_encode($tess);
}

//place end
//route


function RouteSearch($StartDirection, $EndDirection)
{
    $a = QueryChecker($StartDirection);
    $b = QueryChecker($EndDirection);
    $StartDirections = urlencode($a);
    $EndDirections = urlencode($b);

    $request = "maps/preview/directions?authuser=0&hl=id&gl=id&pb=!1m1!1s$StartDirections!1m5!1s$EndDirections!2s!3m2!3d-6.2389278!4d107.0051472!3m12!1m3!1d20078.738839496866!2d107.00139496217045!3d-6.241229154655355!2m3!1f0!2f0!3f0!3m2!1i1536!2i486!4f13.1!6m20!1m1!18b1!2m3!5m1!6e2!20e3!6m11!4b1!23b1!26i1!27i1!41i2!45b1!49b1!67b1!74i150000!75b1!89b1!10b1!16b1!8m0!15m4!1spTooX-X-KJ3vz7sPgoCegAw!4m1!2i17307!7e81!20m28!1m6!1m2!1i0!2i0!2m2!1i458!2i486!1m6!1m2!1i1486!2i0!2m2!1i1536!2i486!1m6!1m2!1i0!2i0!2m2!1i1536!2i20!1m6!1m2!1i0!2i466!2m2!1i1536!2i486!27b1!28m0";
    $response = CurL($request);
    $results = json_decode(str_replace(")]}'", '', $response) , true);

    //$Get = file_get_contents("function/route.json");
    //$results = json_decode($results,true);
    $OriginAddr[] = array(
        'origin' => $results[0][0][0][0][0][0],
        'origin_lat' => $results[0][0][0][0][0][2][2],
        'origin_lng' => $results[0][0][0][0][0][2][3],
        'origin_code' => $results[0][0][0][0][0][1],
    );

    $DestAddr[] = array(
        'destination' => $results[0][0][1][0][0][0],
        'destination_lat' => $results[0][0][1][0][0][2][2],
        'destination_lng' => $results[0][0][1][0][0][2][3],
        'destination_code' => $results[0][0][1][0][0][1],
    );

    $PublicTransportation['avalil_route'] = array(
        //type_PublicTransportation  0 => mengemudi
        ['type_PublicTransportation' => $results[0][1][0][0][0],
        'type_PublicTransportation_length' => $results[0][1][0][0][2][0] . ' meter',
        'type_PublicTransportation_time_duration' => $results[0][1][0][0][3][0] . 'second',
        'type_PublicTransportation_notice' => $results[0][25][0][1],
        ],
        ['type_PublicTransportation' => $results[0][1][1][0][0],
        'type_PublicTransportation_length' => $results[0][1][1][0][2][0] . ' meter',
        'type_PublicTransportation_time_duration' => $results[0][1][1][0][3][0] . ' second',
        'type_PublicTransportation_notice' => $results[0][25][0][1],
        ],

    );

    $AvailMode[] = array(
        'PublicTransportation' => $PublicTransportation,
    );

    $hasil[] = array(
        'origin' => $OriginAddr,
        'dest' => $DestAddr,
        'mode' => $AvailMode,
    );

    return json_encode($hasil);

}

