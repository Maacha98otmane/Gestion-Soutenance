@extends('layouts.sidebar')
@section('content')
@if($projet)
<div class="container px-1 px-md-4 py-5 mx-auto">
    <div class="card cardmd">
        <div class="row d-flex justify-content-center px-3 top1">
            <div class="d-flex">
                <h5>ORDER <span class="text-primary font-weight-bold">{{$projet->id}}</span></h5>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <ul id="progressbar" class="text-center">
                    <li class="active step0"></li>
                    @if ($projet->status === 1)
                    <li class="active step0"></li>

                    @elseif($projet->status === 0)
                    <li class="disactive step0"></li>

                    @else
                    <li class=" step0"></li>

                    @endif
                    @if($projet->soutenance)
                    @if ($projet->status === 1)
                    <li class="active step0"></li>
                    <li class="active step0"></li>
                    @else
                    <li class=" step0"></li>
                    <li class=" step0"></li>
                    @endif
                    @if($projet->soutenance->validate === null)
                    <li class=" step0"></li>
                    @elseif($projet->soutenance->validate === 1)
                    <li class="active step0"></li>
                    @else
                    <li class="disactive step0"></li>
                    @endif
                    @else
                    <li class=" step0"></li>
                    <li class=" step0"></li>
                    <li class=" step0"></li>
                    @endif

                </ul>
            </div>
        </div>
        <div class="row justify-content-between top1">
            <div class="row d-flex icon-content icon-content1">
                <svg style="width: 20px; height: 20px;" version="1.0" xmlns="http://www.w3.org/2000/svg"
                    width="785.000000pt" height="1280.000000pt" viewBox="0 0 785.000000 1280.000000"
                    preserveAspectRatio="xMidYMid meet">
                    <metadata>
                        Created by potrace 1.15, written by Peter Selinger 2001-2017
                    </metadata>
                    <g transform="translate(0.000000,1280.000000) scale(0.100000,-0.100000)" fill="#000000"
                        stroke="none">
                        <path d="M4495 12298 c-604 -535 -1486 -866 -2660 -998 -331 -37 -854 -70
               -1104 -70 l-101 0 -2 -415 -3 -416 30 -29 30 -29 735 -4 c620 -3 753 -7 850
               -21 149 -22 254 -50 316 -86 82 -46 123 -142 161 -372 16 -95 18 -371 21
               -3663 2 -2593 0 -3591 -8 -3675 -44 -446 -177 -714 -416 -838 -279 -144 -663
               -202 -1350 -202 l-330 0 -27 -28 -27 -28 0 -389 0 -389 27 -28 27 -28 3386 0
               3386 0 27 28 27 28 0 390 0 390 -27 26 -28 26 -390 5 c-415 5 -557 17 -779 62
               -212 43 -367 103 -480 187 -156 115 -260 347 -312 693 -17 114 -18 350 -21
               5005 l-3 4884 -27 28 -27 28 -410 -1 -411 0 -80 -71z" />
                    </g>
                </svg>
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Idee<br>Crée</p>
                </div>
            </div>
            <div class="row d-flex icon-content icon-content1"> <svg style="width: 20px; height: 20px;" version="1.0"
                    xmlns="http://www.w3.org/2000/svg" width="810.000000pt" height="1280.000000pt"
                    viewBox="0 0 810.000000 1280.000000" preserveAspectRatio="xMidYMid meet">
                    <metadata>
                        Created by potrace 1.15, written by Peter Selinger 2001-2017
                    </metadata>
                    <g transform="translate(0.000000,1280.000000) scale(0.100000,-0.100000)" fill="#000000"
                        stroke="none">
                        <path d="M3445 12403 c-603 -49 -1043 -156 -1471 -358 -581 -274 -1041 -698
               -1289 -1188 -146 -289 -219 -588 -232 -942 -19 -539 124 -953 437 -1265 194
               -194 412 -311 693 -372 138 -30 484 -33 619 -5 263 53 486 170 666 348 227
               225 340 462 373 782 43 426 -125 829 -430 1031 -36 24 -198 103 -360 176 -162
               72 -306 139 -320 148 -41 25 -81 65 -97 94 -45 87 31 236 184 357 259 207 614
               321 994 321 850 -1 1367 -467 1517 -1367 36 -214 45 -343 45 -623 -1 -503 -68
               -912 -229 -1395 -164 -492 -361 -863 -716 -1345 -284 -385 -570 -731 -1055
               -1276 -814 -914 -1076 -1226 -1345 -1605 -715 -1005 -1043 -1906 -1105 -3032
               l-7 -128 28 -30 29 -29 3417 0 3416 0 6 33 c2 17 107 771 233 1674 l228 1643
               -29 30 -29 30 -388 0 -388 0 -4 -22 c-3 -13 -15 -84 -27 -158 -42 -264 -115
               -504 -196 -650 -118 -211 -334 -300 -798 -330 -86 -6 -907 -10 -1934 -10
               l-1783 0 7 28 c22 91 169 383 287 572 250 399 666 844 1149 1231 298 239 521
               394 964 669 826 512 1176 750 1581 1074 567 452 884 819 1123 1296 245 491
               354 1007 338 1610 -6 239 -21 379 -63 579 -174 844 -721 1532 -1559 1962 -484
               249 -1031 392 -1680 439 -126 9 -700 12 -800 3z" />
                    </g>
                </svg>
                <div class="d-flex flex-column">
                    @if ($projet->status === 1)
                    <p class="font-weight-bold">Idée<br>Acceptée</p>

                    @elseif($projet->status === 0)
                    <p class="font-weight-bold">Idée<br>Refusée</p>

                    @else
                    <p class="font-weight-bold">Idée<br>Pas encore traitée</p>

                    @endif
                </div>
            </div>

            <div class="row d-flex icon-content icon-content1"> <svg style="width: 20px; height: 20px;" version="1.0"
                    xmlns="http://www.w3.org/2000/svg" width="817.000000pt" height="1280.000000pt"
                    viewBox="0 0 817.000000 1280.000000" preserveAspectRatio="xMidYMid meet">
                    <metadata>
                        Created by potrace 1.15, written by Peter Selinger 2001-2017
                    </metadata>
                    <g transform="translate(0.000000,1280.000000) scale(0.100000,-0.100000)" fill="#000000"
                        stroke="none">
                        <path d="M3600 12374 c-221 -15 -362 -27 -465 -40 -729 -91 -1321 -315 -1780
               -675 -119 -93 -317 -292 -396 -399 -170 -229 -275 -472 -331 -770 -19 -96 -22
               -152 -23 -340 0 -194 3 -240 22 -335 40 -195 103 -355 196 -499 217 -332 548
               -535 960 -586 125 -16 403 -7 507 15 251 55 448 162 633 343 199 195 311 432
               339 714 44 454 -160 879 -612 1273 -123 107 -150 141 -142 180 13 72 170 179
               342 235 213 69 530 77 790 20 124 -26 201 -54 325 -115 401 -198 708 -627 855
               -1194 134 -515 154 -1238 49 -1766 -84 -423 -249 -765 -483 -1001 -158 -160
               -310 -248 -515 -301 -130 -33 -263 -39 -514 -22 -117 8 -289 14 -382 14 l-170
               0 -67 -33 c-77 -38 -171 -127 -211 -200 -124 -228 -36 -500 198 -612 127 -61
               284 -73 590 -45 206 19 303 19 433 -1 268 -40 476 -145 668 -338 261 -264 438
               -668 529 -1210 36 -217 53 -395 67 -693 24 -529 -26 -1002 -143 -1369 -218
               -681 -644 -1103 -1237 -1223 -222 -46 -505 -52 -712 -16 -309 54 -618 230
               -662 378 l-12 39 50 47 c28 25 105 92 172 149 299 253 484 542 553 862 29 137
               32 389 6 523 -80 404 -343 718 -737 880 -192 79 -378 111 -645 111 -215 0
               -305 -12 -472 -60 -345 -99 -672 -375 -839 -707 -135 -268 -181 -623 -127
               -982 85 -573 421 -1063 1005 -1468 614 -426 1386 -656 2293 -686 1451 -47
               2614 329 3380 1094 423 422 662 897 756 1505 20 125 23 185 23 440 1 312 -6
               399 -50 650 -220 1232 -1121 2032 -2739 2431 -110 27 -208 49 -217 49 -42 0
               -12 17 70 39 48 13 190 57 316 98 1174 382 1881 924 2201 1688 125 298 174
               554 182 943 7 369 -15 584 -93 881 -47 182 -91 297 -184 486 -162 328 -384
               604 -676 839 -526 423 -1180 662 -2029 742 -150 14 -724 26 -845 18z" />
                    </g>
                </svg>

                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Affectation<br>Des Juries</p>
                </div>
            </div>
            <div class="row d-flex icon-content icon-content1"> <svg style="width: 20px; height: 20px;" version="1.0"
                    xmlns="http://www.w3.org/2000/svg" width="979.000000pt" height="1280.000000pt"
                    viewBox="0 0 979.000000 1280.000000" preserveAspectRatio="xMidYMid meet">
                    <metadata>
                        Created by potrace 1.15, written by Peter Selinger 2001-2017
                    </metadata>
                    <g transform="translate(0.000000,1280.000000) scale(0.100000,-0.100000)" fill="#000000"
                        stroke="none">
                        <path d="M7030 12128 c-74 -16 -349 -74 -610 -128 -530 -111 -557 -120 -679
               -224 -146 -125 -244 -270 -402 -596 -144 -296 -152 -311 -297 -570 -353 -628
               -836 -1438 -1334 -2236 -547 -876 -1238 -1886 -2094 -3060 -116 -160 -223
               -309 -238 -330 -26 -40 -66 -176 -66 -229 0 -52 47 -226 66 -246 13 -12 48
               -23 111 -32 82 -12 316 -7 2244 49 1184 35 2155 62 2156 60 4 -3 37 120 -441
               -1601 -229 -825 -428 -1531 -441 -1570 -38 -109 -49 -180 -49 -315 -1 -153 8
               -178 74 -198 26 -8 96 -15 165 -15 119 -2 124 -1 595 106 l475 108 92 56 92
               56 52 111 c50 107 67 170 444 1679 237 947 399 1575 409 1586 18 20 22 36 6
               26 -5 -3 -10 3 -10 13 0 11 6 22 14 25 8 3 95 7 193 8 98 1 211 5 252 8 l73 6
               49 55 c99 110 96 104 122 260 18 106 21 151 14 168 -6 12 -51 50 -101 85 l-91
               62 -90 -2 c-95 -3 -252 8 -222 14 9 3 15 9 11 14 -3 5 -10 7 -15 4 -5 -4 -9
               -3 -9 1 0 5 51 211 114 459 326 1281 466 1849 466 1885 0 61 -57 227 -83 244
               -12 8 -63 31 -114 51 l-91 36 -342 -45 c-188 -25 -350 -46 -360 -46 -10 0 -76
               -21 -146 -47 -103 -38 -134 -54 -165 -86 -51 -52 -85 -123 -115 -243 -14 -54
               -81 -304 -149 -554 -68 -250 -191 -707 -275 -1015 -83 -308 -159 -587 -169
               -620 -10 -33 -21 -72 -25 -86 l-6 -26 -197 -2 c-109 -1 -927 -15 -1818 -31
               -891 -17 -1639 -30 -1662 -30 l-43 0 248 283 c1060 1209 2214 2580 2987 3547
               757 947 1428 1860 1710 2330 135 226 190 351 202 461 5 47 0 73 -28 159 -23
               72 -40 107 -56 117 -41 27 -202 83 -236 82 -17 -1 -93 -14 -167 -31z" />
                    </g>
                </svg>
                @if($projet->soutenance)
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Date soutenance<br>{{$projet->soutenance->dateDefense}}</p>
                </div>
                @else
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Date soutenance<br>Pas Encore Affecte</p>
                </div>
                @endif

            </div>

            <div class="row d-flex icon-content icon-content1"> <svg style="width: 20px; height: 20px;" version="1.0"
                    xmlns="http://www.w3.org/2000/svg" width="940.000000pt" height="1280.000000pt"
                    viewBox="0 0 940.000000 1280.000000" preserveAspectRatio="xMidYMid meet">
                    <metadata>
                        Created by potrace 1.15, written by Peter Selinger 2001-2017
                    </metadata>
                    <g transform="translate(0.000000,1280.000000) scale(0.100000,-0.100000)" fill="#000000"
                        stroke="none">
                        <path d="M8122 12296 c-47 -10 -57 -17 -93 -66 -56 -75 -171 -192 -243 -246
               -232 -176 -531 -264 -894 -264 -235 0 -490 24 -1112 105 -518 67 -639 78 -870
               79 -164 1 -194 -2 -263 -22 -232 -67 -336 -182 -463 -509 -24 -62 -62 -174
               -85 -250 -23 -76 -88 -255 -144 -398 -56 -143 -105 -271 -109 -285 -24 -82
               -99 -268 -171 -420 -45 -96 -230 -510 -410 -920 -180 -410 -373 -844 -430
               -965 -57 -121 -146 -315 -198 -432 l-95 -212 192 -99 c105 -55 196 -102 202
               -104 6 -2 72 69 145 157 161 193 445 480 589 595 276 220 531 352 785 405 108
               23 307 23 400 1 162 -39 315 -142 421 -283 100 -133 162 -274 207 -478 20 -91
               22 -126 21 -395 0 -248 -4 -322 -23 -465 -210 -1579 -1184 -3166 -2791 -4550
               -647 -557 -1365 -1043 -2061 -1395 l-176 -89 -23 -62 -23 -62 76 -152 76 -153
               61 -20 61 -21 202 106 c1267 664 2137 1168 2710 1570 997 698 1873 1476 2442
               2168 740 900 1115 1833 1082 2690 -24 596 -231 1090 -632 1504 -329 340 -705
               535 -1195 620 -526 92 -974 27 -1453 -209 -76 -38 -136 -63 -134 -57 3 7 113
               278 245 602 265 653 351 853 453 1058 79 158 95 172 198 183 87 9 320 -23 501
               -70 468 -121 856 -179 1205 -180 233 0 353 14 540 63 661 174 1142 648 1615
               1591 51 101 59 125 48 135 -31 29 -309 215 -321 214 -6 -1 -36 -6 -65 -13z" />
                    </g>
                </svg>
                @if($projet->soutenance)
                @if($projet->soutenance->validate === null)
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Resultat<br>Final</p>
                </div>
                @elseif($projet->soutenance->validate === 1)
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">َAdmis</p>
                </div>
                @else
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Non Admis</p>
                </div>
                @endif
                @else
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Resultat<br>Final</p>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
@else
<div class="alert text-center alert-warning" role="alert">
    pas encore creer votre demande
</div>
@endif
@endsection
