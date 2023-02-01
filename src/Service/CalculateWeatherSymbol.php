<?php

namespace App\Service;

class CalculateWeatherSymbol
{
    /**
     * 1:0:d=2023013112:PRMSL:mean sea level:1 hour fcst:
    2:1002524:d=2023013112:CLWMR:1 hybrid level:1 hour fcst:
    3:1092157:d=2023013112:ICMR:1 hybrid level:1 hour fcst:
    4:1436881:d=2023013112:RWMR:1 hybrid level:1 hour fcst:
    5:1682223:d=2023013112:SNMR:1 hybrid level:1 hour fcst:
    6:1767502:d=2023013112:GRLE:1 hybrid level:1 hour fcst:
    7:1791458:d=2023013112:REFD:1 hybrid level:1 hour fcst:
    8:2604330:d=2023013112:REFD:2 hybrid level:1 hour fcst:
    9:3417576:d=2023013112:REFC:entire atmosphere:1 hour fcst:
    10:4292417:d=2023013112:VIS:surface:1 hour fcst:
    11:5147646:d=2023013112:UGRD:planetary boundary layer:1 hour fcst:
    12:5736397:d=2023013112:VGRD:planetary boundary layer:1 hour fcst:
    13:6322477:d=2023013112:VRATE:planetary boundary layer:1 hour fcst:
    14:6913101:d=2023013112:GUST:surface:1 hour fcst:
    15:7517540:d=2023013112:HGT:0.01 mb:1 hour fcst:
    16:8521127:d=2023013112:TMP:0.01 mb:1 hour fcst:
    17:9094798:d=2023013112:RH:0.01 mb:1 hour fcst:
    18:9114832:d=2023013112:SPFH:0.01 mb:1 hour fcst:
    19:10040554:d=2023013112:VVEL:0.01 mb:1 hour fcst:
    20:11370315:d=2023013112:DZDT:0.01 mb:1 hour fcst:
    21:12623524:d=2023013112:UGRD:0.01 mb:1 hour fcst:
    22:13217687:d=2023013112:VGRD:0.01 mb:1 hour fcst:
    23:13732274:d=2023013112:ABSV:0.01 mb:1 hour fcst:
    24:14073948:d=2023013112:O3MR:0.01 mb:1 hour fcst:
    25:15018893:d=2023013112:HGT:0.02 mb:1 hour fcst:
    26:15999228:d=2023013112:TMP:0.02 mb:1 hour fcst:
    27:16828009:d=2023013112:RH:0.02 mb:1 hour fcst:
    28:16852354:d=2023013112:SPFH:0.02 mb:1 hour fcst:
    29:17836454:d=2023013112:VVEL:0.02 mb:1 hour fcst:
    30:19120014:d=2023013112:DZDT:0.02 mb:1 hour fcst:
    31:20438612:d=2023013112:UGRD:0.02 mb:1 hour fcst:
    32:21095096:d=2023013112:VGRD:0.02 mb:1 hour fcst:
    33:21664236:d=2023013112:ABSV:0.02 mb:1 hour fcst:
    34:22438198:d=2023013112:O3MR:0.02 mb:1 hour fcst:
    35:23524131:d=2023013112:HGT:0.04 mb:1 hour fcst:
    36:24442412:d=2023013112:TMP:0.04 mb:1 hour fcst:
    37:25290921:d=2023013112:RH:0.04 mb:1 hour fcst:
    38:25292169:d=2023013112:SPFH:0.04 mb:1 hour fcst:
    39:26263524:d=2023013112:VVEL:0.04 mb:1 hour fcst:
    40:27291310:d=2023013112:DZDT:0.04 mb:1 hour fcst:
    41:28363898:d=2023013112:UGRD:0.04 mb:1 hour fcst:
    42:28972953:d=2023013112:VGRD:0.04 mb:1 hour fcst:
    43:29542312:d=2023013112:ABSV:0.04 mb:1 hour fcst:
    44:30404551:d=2023013112:O3MR:0.04 mb:1 hour fcst:
    45:31493063:d=2023013112:HGT:0.07 mb:1 hour fcst:
    46:32399523:d=2023013112:TMP:0.07 mb:1 hour fcst:
    47:33259674:d=2023013112:RH:0.07 mb:1 hour fcst:
    48:33259884:d=2023013112:SPFH:0.07 mb:1 hour fcst:
    49:34210184:d=2023013112:VVEL:0.07 mb:1 hour fcst:
    50:35319628:d=2023013112:DZDT:0.07 mb:1 hour fcst:
    51:36382099:d=2023013112:UGRD:0.07 mb:1 hour fcst:
    52:37010893:d=2023013112:VGRD:0.07 mb:1 hour fcst:
    53:37590218:d=2023013112:ABSV:0.07 mb:1 hour fcst:
    54:38438524:d=2023013112:O3MR:0.07 mb:1 hour fcst:
    55:39579633:d=2023013112:HGT:0.1 mb:1 hour fcst:
    56:40480556:d=2023013112:TMP:0.1 mb:1 hour fcst:
    57:41311883:d=2023013112:RH:0.1 mb:1 hour fcst:
    58:41312093:d=2023013112:SPFH:0.1 mb:1 hour fcst:
    59:42230254:d=2023013112:VVEL:0.1 mb:1 hour fcst:
    60:43384377:d=2023013112:DZDT:0.1 mb:1 hour fcst:
    61:44429289:d=2023013112:UGRD:0.1 mb:1 hour fcst:
    62:45041295:d=2023013112:VGRD:0.1 mb:1 hour fcst:
    63:45598275:d=2023013112:ABSV:0.1 mb:1 hour fcst:
    64:46416080:d=2023013112:O3MR:0.1 mb:1 hour fcst:
    65:47621945:d=2023013112:HGT:0.2 mb:1 hour fcst:
    66:48497539:d=2023013112:TMP:0.2 mb:1 hour fcst:
    67:49299970:d=2023013112:RH:0.2 mb:1 hour fcst:
    68:49300180:d=2023013112:SPFH:0.2 mb:1 hour fcst:
    69:50172622:d=2023013112:VVEL:0.2 mb:1 hour fcst:
    70:51407028:d=2023013112:DZDT:0.2 mb:1 hour fcst:
    71:52713607:d=2023013112:UGRD:0.2 mb:1 hour fcst:
    72:53290676:d=2023013112:VGRD:0.2 mb:1 hour fcst:
    73:53811643:d=2023013112:ABSV:0.2 mb:1 hour fcst:
    74:54558132:d=2023013112:O3MR:0.2 mb:1 hour fcst:
    75:55532098:d=2023013112:HGT:0.4 mb:1 hour fcst:
    76:56386621:d=2023013112:TMP:0.4 mb:1 hour fcst:
    77:57182768:d=2023013112:RH:0.4 mb:1 hour fcst:
    78:57182978:d=2023013112:SPFH:0.4 mb:1 hour fcst:
    79:58074545:d=2023013112:VVEL:0.4 mb:1 hour fcst:
    80:59404127:d=2023013112:DZDT:0.4 mb:1 hour fcst:
    81:60681321:d=2023013112:UGRD:0.4 mb:1 hour fcst:
    82:61234172:d=2023013112:VGRD:0.4 mb:1 hour fcst:
    83:61732179:d=2023013112:ABSV:0.4 mb:1 hour fcst:
    84:62434477:d=2023013112:O3MR:0.4 mb:1 hour fcst:
    85:63465920:d=2023013112:HGT:0.7 mb:1 hour fcst:
    86:64308027:d=2023013112:TMP:0.7 mb:1 hour fcst:
    87:65100742:d=2023013112:RH:0.7 mb:1 hour fcst:
    88:65100952:d=2023013112:SPFH:0.7 mb:1 hour fcst:
    89:66020544:d=2023013112:VVEL:0.7 mb:1 hour fcst:
    90:67293504:d=2023013112:DZDT:0.7 mb:1 hour fcst:
    91:68265174:d=2023013112:UGRD:0.7 mb:1 hour fcst:
    92:68810554:d=2023013112:VGRD:0.7 mb:1 hour fcst:
    93:69291766:d=2023013112:ABSV:0.7 mb:1 hour fcst:
    94:69952148:d=2023013112:O3MR:0.7 mb:1 hour fcst:
    95:71037500:d=2023013112:HGT:1 mb:1 hour fcst:
    96:71870507:d=2023013112:TMP:1 mb:1 hour fcst:
    97:72654321:d=2023013112:RH:1 mb:1 hour fcst:
    98:72654531:d=2023013112:SPFH:1 mb:1 hour fcst:
    99:73589035:d=2023013112:VVEL:1 mb:1 hour fcst:
    100:74617013:d=2023013112:DZDT:1 mb:1 hour fcst:
    101:75849989:d=2023013112:UGRD:1 mb:1 hour fcst:
    102:76381198:d=2023013112:VGRD:1 mb:1 hour fcst:
    103:76844877:d=2023013112:ABSV:1 mb:1 hour fcst:
    104:77464307:d=2023013112:O3MR:1 mb:1 hour fcst:
    105:78578877:d=2023013112:HGT:2 mb:1 hour fcst:
    106:79385596:d=2023013112:TMP:2 mb:1 hour fcst:
    107:80186653:d=2023013112:RH:2 mb:1 hour fcst:
    108:80186863:d=2023013112:SPFH:2 mb:1 hour fcst:
    109:81166133:d=2023013112:VVEL:2 mb:1 hour fcst:
    110:82296239:d=2023013112:DZDT:2 mb:1 hour fcst:
    111:83511002:d=2023013112:UGRD:2 mb:1 hour fcst:
    112:84037184:d=2023013112:VGRD:2 mb:1 hour fcst:
    113:84494975:d=2023013112:ABSV:2 mb:1 hour fcst:
    114:85110253:d=2023013112:O3MR:2 mb:1 hour fcst:
    115:86252539:d=2023013112:HGT:3 mb:1 hour fcst:
    116:87044784:d=2023013112:TMP:3 mb:1 hour fcst:
    117:87828403:d=2023013112:RH:3 mb:1 hour fcst:
    118:87828613:d=2023013112:SPFH:3 mb:1 hour fcst:
    119:88816288:d=2023013112:VVEL:3 mb:1 hour fcst:
    120:89992249:d=2023013112:DZDT:3 mb:1 hour fcst:
    121:91302106:d=2023013112:UGRD:3 mb:1 hour fcst:
    122:91810160:d=2023013112:VGRD:3 mb:1 hour fcst:
    123:92255824:d=2023013112:ABSV:3 mb:1 hour fcst:
    124:92859522:d=2023013112:O3MR:3 mb:1 hour fcst:
    125:93854085:d=2023013112:HGT:5 mb:1 hour fcst:
    126:94612510:d=2023013112:TMP:5 mb:1 hour fcst:
    127:95401390:d=2023013112:RH:5 mb:1 hour fcst:
    128:95404677:d=2023013112:SPFH:5 mb:1 hour fcst:
    129:96425669:d=2023013112:VVEL:5 mb:1 hour fcst:
    130:97682549:d=2023013112:DZDT:5 mb:1 hour fcst:
    131:98972633:d=2023013112:UGRD:5 mb:1 hour fcst:
    132:99482488:d=2023013112:VGRD:5 mb:1 hour fcst:
    133:99929242:d=2023013112:ABSV:5 mb:1 hour fcst:
    134:100260332:d=2023013112:O3MR:5 mb:1 hour fcst:
    135:101014847:d=2023013112:HGT:7 mb:1 hour fcst:
    136:101752119:d=2023013112:TMP:7 mb:1 hour fcst:
    137:102519151:d=2023013112:RH:7 mb:1 hour fcst:
    138:102533892:d=2023013112:SPFH:7 mb:1 hour fcst:
    139:103537769:d=2023013112:VVEL:7 mb:1 hour fcst:
    140:104833510:d=2023013112:DZDT:7 mb:1 hour fcst:
    141:106085727:d=2023013112:UGRD:7 mb:1 hour fcst:
    142:106587145:d=2023013112:VGRD:7 mb:1 hour fcst:
    143:107036107:d=2023013112:ABSV:7 mb:1 hour fcst:
    144:107395856:d=2023013112:O3MR:7 mb:1 hour fcst:
    145:108163427:d=2023013112:HGT:10 mb:1 hour fcst:
    146:108883274:d=2023013112:TMP:10 mb:1 hour fcst:
    147:109640520:d=2023013112:RH:10 mb:1 hour fcst:
    148:109678866:d=2023013112:SPFH:10 mb:1 hour fcst:
    149:110670308:d=2023013112:VVEL:10 mb:1 hour fcst:
    150:112010112:d=2023013112:DZDT:10 mb:1 hour fcst:
    151:113238572:d=2023013112:UGRD:10 mb:1 hour fcst:
    152:113738862:d=2023013112:VGRD:10 mb:1 hour fcst:
    153:114218674:d=2023013112:ABSV:10 mb:1 hour fcst:
    154:114629627:d=2023013112:O3MR:10 mb:1 hour fcst:
    155:115780605:d=2023013112:HGT:15 mb:1 hour fcst:
    156:116478432:d=2023013112:TMP:15 mb:1 hour fcst:
    157:117242832:d=2023013112:RH:15 mb:1 hour fcst:
    158:117325088:d=2023013112:SPFH:15 mb:1 hour fcst:
    159:118312717:d=2023013112:VVEL:15 mb:1 hour fcst:
    160:119716788:d=2023013112:DZDT:15 mb:1 hour fcst:
    161:120931104:d=2023013112:UGRD:15 mb:1 hour fcst:
    162:121443775:d=2023013112:VGRD:15 mb:1 hour fcst:
    163:121932195:d=2023013112:ABSV:15 mb:1 hour fcst:
    164:122356752:d=2023013112:O3MR:15 mb:1 hour fcst:
    165:123574115:d=2023013112:HGT:20 mb:1 hour fcst:
    166:124373735:d=2023013112:TMP:20 mb:1 hour fcst:
    167:125133920:d=2023013112:RH:20 mb:1 hour fcst:
    168:125255393:d=2023013112:SPFH:20 mb:1 hour fcst:
    169:126224722:d=2023013112:VVEL:20 mb:1 hour fcst:
    170:127674518:d=2023013112:DZDT:20 mb:1 hour fcst:
    171:128876411:d=2023013112:UGRD:20 mb:1 hour fcst:
    172:129379726:d=2023013112:VGRD:20 mb:1 hour fcst:
    173:129854408:d=2023013112:ABSV:20 mb:1 hour fcst:
    174:130616929:d=2023013112:O3MR:20 mb:1 hour fcst:
    175:131853074:d=2023013112:HGT:30 mb:1 hour fcst:
    176:132630028:d=2023013112:TMP:30 mb:1 hour fcst:
    177:133366517:d=2023013112:RH:30 mb:1 hour fcst:
    178:133541889:d=2023013112:SPFH:30 mb:1 hour fcst:
    179:134497427:d=2023013112:VVEL:30 mb:1 hour fcst:
    180:135864036:d=2023013112:DZDT:30 mb:1 hour fcst:
    181:137030905:d=2023013112:UGRD:30 mb:1 hour fcst:
    182:137522803:d=2023013112:VGRD:30 mb:1 hour fcst:
    183:137975516:d=2023013112:ABSV:30 mb:1 hour fcst:
    184:138709256:d=2023013112:O3MR:30 mb:1 hour fcst:
    185:140062483:d=2023013112:HGT:40 mb:1 hour fcst:
    186:140821411:d=2023013112:TMP:40 mb:1 hour fcst:
    187:141588223:d=2023013112:RH:40 mb:1 hour fcst:
    188:141820400:d=2023013112:SPFH:40 mb:1 hour fcst:
    189:142832501:d=2023013112:VVEL:40 mb:1 hour fcst:
    190:143946457:d=2023013112:DZDT:40 mb:1 hour fcst:
    191:145106422:d=2023013112:UGRD:40 mb:1 hour fcst:
    192:145617531:d=2023013112:VGRD:40 mb:1 hour fcst:
    193:146098151:d=2023013112:ABSV:40 mb:1 hour fcst:
    194:146871082:d=2023013112:O3MR:40 mb:1 hour fcst:
    195:148128168:d=2023013112:HGT:50 mb:1 hour fcst:
    196:148876201:d=2023013112:TMP:50 mb:1 hour fcst:
    197:149623939:d=2023013112:RH:50 mb:1 hour fcst:
    198:149900048:d=2023013112:TCDC:50 mb:1 hour fcst:
    199:149900227:d=2023013112:SPFH:50 mb:1 hour fcst:
    200:150929841:d=2023013112:VVEL:50 mb:1 hour fcst:
    201:152061085:d=2023013112:DZDT:50 mb:1 hour fcst:
    202:153195374:d=2023013112:UGRD:50 mb:1 hour fcst:
    203:153691361:d=2023013112:VGRD:50 mb:1 hour fcst:
    204:154161703:d=2023013112:ABSV:50 mb:1 hour fcst:
    205:154925987:d=2023013112:CLWMR:50 mb:1 hour fcst:
    206:154926166:d=2023013112:ICMR:50 mb:1 hour fcst:
    207:154926345:d=2023013112:RWMR:50 mb:1 hour fcst:
    208:156018223:d=2023013112:SNMR:50 mb:1 hour fcst:
    209:157091040:d=2023013112:GRLE:50 mb:1 hour fcst:
    210:158169508:d=2023013112:O3MR:50 mb:1 hour fcst:
    211:159376193:d=2023013112:HGT:70 mb:1 hour fcst:
    212:160122067:d=2023013112:TMP:70 mb:1 hour fcst:
    213:160884993:d=2023013112:RH:70 mb:1 hour fcst:
    214:161302381:d=2023013112:SPFH:70 mb:1 hour fcst:
    215:162414699:d=2023013112:VVEL:70 mb:1 hour fcst:
    216:163606062:d=2023013112:DZDT:70 mb:1 hour fcst:
    217:164732766:d=2023013112:UGRD:70 mb:1 hour fcst:
    218:165614479:d=2023013112:VGRD:70 mb:1 hour fcst:
    219:166470652:d=2023013112:ABSV:70 mb:1 hour fcst:
    220:167278123:d=2023013112:O3MR:70 mb:1 hour fcst:
    221:168548924:d=2023013112:HGT:100 mb:1 hour fcst:
    222:169299845:d=2023013112:TMP:100 mb:1 hour fcst:
    223:170066875:d=2023013112:RH:100 mb:1 hour fcst:
    224:170580998:d=2023013112:TCDC:100 mb:1 hour fcst:
    225:170720042:d=2023013112:SPFH:100 mb:1 hour fcst:
    226:171964208:d=2023013112:VVEL:100 mb:1 hour fcst:
    227:173246403:d=2023013112:DZDT:100 mb:1 hour fcst:
    228:174395617:d=2023013112:UGRD:100 mb:1 hour fcst:
    229:175363613:d=2023013112:VGRD:100 mb:1 hour fcst:
    230:176272582:d=2023013112:ABSV:100 mb:1 hour fcst:
    231:177138043:d=2023013112:CLWMR:100 mb:1 hour fcst:
    232:177139078:d=2023013112:ICMR:100 mb:1 hour fcst:
    233:177186530:d=2023013112:RWMR:100 mb:1 hour fcst:
    234:178072819:d=2023013112:SNMR:100 mb:1 hour fcst:
    235:178073559:d=2023013112:GRLE:100 mb:1 hour fcst:
    236:178094348:d=2023013112:O3MR:100 mb:1 hour fcst:
    237:179233676:d=2023013112:HGT:150 mb:1 hour fcst:
    238:179981774:d=2023013112:TMP:150 mb:1 hour fcst:
    239:180727753:d=2023013112:RH:150 mb:1 hour fcst:
    240:181309090:d=2023013112:TCDC:150 mb:1 hour fcst:
    241:181490909:d=2023013112:SPFH:150 mb:1 hour fcst:
    242:182627904:d=2023013112:VVEL:150 mb:1 hour fcst:
    243:183592134:d=2023013112:DZDT:150 mb:1 hour fcst:
    244:184644205:d=2023013112:UGRD:150 mb:1 hour fcst:
    245:185623849:d=2023013112:VGRD:150 mb:1 hour fcst:
    246:186546420:d=2023013112:ABSV:150 mb:1 hour fcst:
    247:187433403:d=2023013112:CLWMR:150 mb:1 hour fcst:
    248:187452125:d=2023013112:ICMR:150 mb:1 hour fcst:
    249:187585222:d=2023013112:RWMR:150 mb:1 hour fcst:
    250:188534950:d=2023013112:SNMR:150 mb:1 hour fcst:
    251:188545240:d=2023013112:GRLE:150 mb:1 hour fcst:
    252:188547256:d=2023013112:O3MR:150 mb:1 hour fcst:
    253:189542889:d=2023013112:HGT:200 mb:1 hour fcst:
    254:190286600:d=2023013112:TMP:200 mb:1 hour fcst:
    255:191042908:d=2023013112:RH:200 mb:1 hour fcst:
    256:191751651:d=2023013112:TCDC:200 mb:1 hour fcst:
    257:192062312:d=2023013112:SPFH:200 mb:1 hour fcst:
    258:193214814:d=2023013112:VVEL:200 mb:1 hour fcst:
    259:194239388:d=2023013112:DZDT:200 mb:1 hour fcst:
    260:195303869:d=2023013112:UGRD:200 mb:1 hour fcst:
    261:195886605:d=2023013112:VGRD:200 mb:1 hour fcst:
    262:196465288:d=2023013112:ABSV:200 mb:1 hour fcst:
    263:197373199:d=2023013112:CLWMR:200 mb:1 hour fcst:
    264:197427298:d=2023013112:ICMR:200 mb:1 hour fcst:
    265:197654948:d=2023013112:RWMR:200 mb:1 hour fcst:
    266:198640826:d=2023013112:SNMR:200 mb:1 hour fcst:
    267:198698050:d=2023013112:GRLE:200 mb:1 hour fcst:
    268:198701418:d=2023013112:O3MR:200 mb:1 hour fcst:
    269:199618126:d=2023013112:HGT:250 mb:1 hour fcst:
    270:200355669:d=2023013112:TMP:250 mb:1 hour fcst:
    271:201101916:d=2023013112:RH:250 mb:1 hour fcst:
    272:201902758:d=2023013112:TCDC:250 mb:1 hour fcst:
    273:202327692:d=2023013112:SPFH:250 mb:1 hour fcst:
    274:203483375:d=2023013112:VVEL:250 mb:1 hour fcst:
    275:204553750:d=2023013112:DZDT:250 mb:1 hour fcst:
    276:205631193:d=2023013112:UGRD:250 mb:1 hour fcst:
    277:206220798:d=2023013112:VGRD:250 mb:1 hour fcst:
    278:206816327:d=2023013112:ABSV:250 mb:1 hour fcst:
    279:207757159:d=2023013112:CLWMR:250 mb:1 hour fcst:
    280:207758643:d=2023013112:ICMR:250 mb:1 hour fcst:
    281:208089599:d=2023013112:RWMR:250 mb:1 hour fcst:
    282:208981047:d=2023013112:SNMR:250 mb:1 hour fcst:
    283:209081141:d=2023013112:GRLE:250 mb:1 hour fcst:
    284:209087727:d=2023013112:O3MR:250 mb:1 hour fcst:
    285:210256004:d=2023013112:HGT:300 mb:1 hour fcst:
    286:210987183:d=2023013112:TMP:300 mb:1 hour fcst:
    287:211749383:d=2023013112:RH:300 mb:1 hour fcst:
    288:212606318:d=2023013112:TCDC:300 mb:1 hour fcst:
    289:213084532:d=2023013112:SPFH:300 mb:1 hour fcst:
    290:214253986:d=2023013112:VVEL:300 mb:1 hour fcst:
    291:215368448:d=2023013112:DZDT:300 mb:1 hour fcst:
    292:216459056:d=2023013112:UGRD:300 mb:1 hour fcst:
    293:217064475:d=2023013112:VGRD:300 mb:1 hour fcst:
    294:217684491:d=2023013112:ABSV:300 mb:1 hour fcst:
    295:218671694:d=2023013112:CLWMR:300 mb:1 hour fcst:
    296:218673598:d=2023013112:ICMR:300 mb:1 hour fcst:
    297:219086316:d=2023013112:RWMR:300 mb:1 hour fcst:
    298:219953705:d=2023013112:SNMR:300 mb:1 hour fcst:
    299:220081468:d=2023013112:GRLE:300 mb:1 hour fcst:
    300:220093992:d=2023013112:O3MR:300 mb:1 hour fcst:
    301:221233913:d=2023013112:HGT:350 mb:1 hour fcst:
    302:221954327:d=2023013112:TMP:350 mb:1 hour fcst:
    303:222690144:d=2023013112:RH:350 mb:1 hour fcst:
    304:223527876:d=2023013112:TCDC:350 mb:1 hour fcst:
    305:224014897:d=2023013112:SPFH:350 mb:1 hour fcst:
    306:225168568:d=2023013112:VVEL:350 mb:1 hour fcst:
    307:226301510:d=2023013112:DZDT:350 mb:1 hour fcst:
    308:227385380:d=2023013112:UGRD:350 mb:1 hour fcst:
    309:227976856:d=2023013112:VGRD:350 mb:1 hour fcst:
    310:228585940:d=2023013112:ABSV:350 mb:1 hour fcst:
    311:229563992:d=2023013112:CLWMR:350 mb:1 hour fcst:
    312:229566930:d=2023013112:ICMR:350 mb:1 hour fcst:
    313:229998455:d=2023013112:RWMR:350 mb:1 hour fcst:
    314:230405469:d=2023013112:SNMR:350 mb:1 hour fcst:
    315:230553969:d=2023013112:GRLE:350 mb:1 hour fcst:
    316:230573364:d=2023013112:O3MR:350 mb:1 hour fcst:
    317:231784181:d=2023013112:HGT:400 mb:1 hour fcst:
    318:232494448:d=2023013112:TMP:400 mb:1 hour fcst:
    319:233224718:d=2023013112:RH:400 mb:1 hour fcst:
    320:234052751:d=2023013112:TCDC:400 mb:1 hour fcst:
    321:234523109:d=2023013112:SPFH:400 mb:1 hour fcst:
    322:235764529:d=2023013112:VVEL:400 mb:1 hour fcst:
    323:236903357:d=2023013112:DZDT:400 mb:1 hour fcst:
    324:237975258:d=2023013112:UGRD:400 mb:1 hour fcst:
    325:238551355:d=2023013112:VGRD:400 mb:1 hour fcst:
    326:239140725:d=2023013112:ABSV:400 mb:1 hour fcst:
    327:240089011:d=2023013112:CLWMR:400 mb:1 hour fcst:
    328:240095112:d=2023013112:ICMR:400 mb:1 hour fcst:
    329:240524644:d=2023013112:RWMR:400 mb:1 hour fcst:
    330:240866732:d=2023013112:SNMR:400 mb:1 hour fcst:
    331:241031276:d=2023013112:GRLE:400 mb:1 hour fcst:
    332:241058016:d=2023013112:O3MR:400 mb:1 hour fcst:
    333:242218328:d=2023013112:HGT:450 mb:1 hour fcst:
    334:242921180:d=2023013112:TMP:450 mb:1 hour fcst:
    335:243645439:d=2023013112:RH:450 mb:1 hour fcst:
    336:244461311:d=2023013112:TCDC:450 mb:1 hour fcst:
    337:244918620:d=2023013112:SPFH:450 mb:1 hour fcst:
    338:246105479:d=2023013112:VVEL:450 mb:1 hour fcst:
    339:247248209:d=2023013112:DZDT:450 mb:1 hour fcst:
    340:248430962:d=2023013112:UGRD:450 mb:1 hour fcst:
    341:248994871:d=2023013112:VGRD:450 mb:1 hour fcst:
    342:249570083:d=2023013112:ABSV:450 mb:1 hour fcst:
    343:250494216:d=2023013112:CLWMR:450 mb:1 hour fcst:
    344:250514027:d=2023013112:ICMR:450 mb:1 hour fcst:
    345:250965141:d=2023013112:RWMR:450 mb:1 hour fcst:
    346:251259566:d=2023013112:SNMR:450 mb:1 hour fcst:
    347:251438912:d=2023013112:GRLE:450 mb:1 hour fcst:
    348:251473580:d=2023013112:O3MR:450 mb:1 hour fcst:
    349:252596619:d=2023013112:HGT:500 mb:1 hour fcst:
    350:253406046:d=2023013112:TMP:500 mb:1 hour fcst:
    351:254130141:d=2023013112:RH:500 mb:1 hour fcst:
    352:254936546:d=2023013112:TCDC:500 mb:1 hour fcst:
    353:255388216:d=2023013112:SPFH:500 mb:1 hour fcst:
    354:256634000:d=2023013112:VVEL:500 mb:1 hour fcst:
    355:257780537:d=2023013112:DZDT:500 mb:1 hour fcst:
    356:258952221:d=2023013112:UGRD:500 mb:1 hour fcst:
    357:259503836:d=2023013112:VGRD:500 mb:1 hour fcst:
    358:260058671:d=2023013112:ABSV:500 mb:1 hour fcst:
    359:260955115:d=2023013112:CLWMR:500 mb:1 hour fcst:
    360:261019320:d=2023013112:ICMR:500 mb:1 hour fcst:
    361:261465073:d=2023013112:RWMR:500 mb:1 hour fcst:
    362:261583732:d=2023013112:SNMR:500 mb:1 hour fcst:
    363:261778377:d=2023013112:GRLE:500 mb:1 hour fcst:
    364:261825227:d=2023013112:O3MR:500 mb:1 hour fcst:
    365:262917714:d=2023013112:HGT:550 mb:1 hour fcst:
    366:263723604:d=2023013112:TMP:550 mb:1 hour fcst:
    367:264450261:d=2023013112:RH:550 mb:1 hour fcst:
    368:265252435:d=2023013112:TCDC:550 mb:1 hour fcst:
    369:265701526:d=2023013112:SPFH:550 mb:1 hour fcst:
    370:266997184:d=2023013112:VVEL:550 mb:1 hour fcst:
    371:268152374:d=2023013112:DZDT:550 mb:1 hour fcst:
    372:269318357:d=2023013112:UGRD:550 mb:1 hour fcst:
    373:270225632:d=2023013112:VGRD:550 mb:1 hour fcst:
    374:271131963:d=2023013112:ABSV:550 mb:1 hour fcst:
    375:272000725:d=2023013112:CLWMR:550 mb:1 hour fcst:
    376:272110438:d=2023013112:ICMR:550 mb:1 hour fcst:
    377:272546937:d=2023013112:RWMR:550 mb:1 hour fcst:
    378:272591410:d=2023013112:SNMR:550 mb:1 hour fcst:
    379:272793362:d=2023013112:GRLE:550 mb:1 hour fcst:
    380:272856608:d=2023013112:O3MR:550 mb:1 hour fcst:
    381:273912231:d=2023013112:HGT:600 mb:1 hour fcst:
    382:274757657:d=2023013112:TMP:600 mb:1 hour fcst:
    383:275489879:d=2023013112:RH:600 mb:1 hour fcst:
    384:276293107:d=2023013112:TCDC:600 mb:1 hour fcst:
    385:276715353:d=2023013112:SPFH:600 mb:1 hour fcst:
    386:277927465:d=2023013112:VVEL:600 mb:1 hour fcst:
    387:279090687:d=2023013112:DZDT:600 mb:1 hour fcst:
    388:280253072:d=2023013112:UGRD:600 mb:1 hour fcst:
    389:281153736:d=2023013112:VGRD:600 mb:1 hour fcst:
    390:282053513:d=2023013112:ABSV:600 mb:1 hour fcst:
    391:282908084:d=2023013112:CLWMR:600 mb:1 hour fcst:
    392:283044818:d=2023013112:ICMR:600 mb:1 hour fcst:
    393:283415435:d=2023013112:RWMR:600 mb:1 hour fcst:
    394:283495803:d=2023013112:SNMR:600 mb:1 hour fcst:
    395:283659431:d=2023013112:GRLE:600 mb:1 hour fcst:
    396:283704669:d=2023013112:O3MR:600 mb:1 hour fcst:
    397:284719092:d=2023013112:HGT:650 mb:1 hour fcst:
    398:285566299:d=2023013112:TMP:650 mb:1 hour fcst:
    399:286305727:d=2023013112:RH:650 mb:1 hour fcst:
    400:287118929:d=2023013112:TCDC:650 mb:1 hour fcst:
    401:287514037:d=2023013112:SPFH:650 mb:1 hour fcst:
    402:288726677:d=2023013112:VVEL:650 mb:1 hour fcst:
    403:289898610:d=2023013112:DZDT:650 mb:1 hour fcst:
    404:291058139:d=2023013112:UGRD:650 mb:1 hour fcst:
    405:291957590:d=2023013112:VGRD:650 mb:1 hour fcst:
    406:292850716:d=2023013112:ABSV:650 mb:1 hour fcst:
    407:293701711:d=2023013112:CLWMR:650 mb:1 hour fcst:
    408:293829402:d=2023013112:ICMR:650 mb:1 hour fcst:
    409:294150465:d=2023013112:RWMR:650 mb:1 hour fcst:
    410:294244987:d=2023013112:SNMR:650 mb:1 hour fcst:
    411:294383822:d=2023013112:GRLE:650 mb:1 hour fcst:
    412:294421763:d=2023013112:O3MR:650 mb:1 hour fcst:
    413:295407383:d=2023013112:HGT:700 mb:1 hour fcst:
    414:296265059:d=2023013112:TMP:700 mb:1 hour fcst:
    415:297021820:d=2023013112:RH:700 mb:1 hour fcst:
    416:297848741:d=2023013112:TCDC:700 mb:1 hour fcst:
    417:298233964:d=2023013112:SPFH:700 mb:1 hour fcst:
    418:299481582:d=2023013112:VVEL:700 mb:1 hour fcst:
    419:300663720:d=2023013112:DZDT:700 mb:1 hour fcst:
    420:301822732:d=2023013112:UGRD:700 mb:1 hour fcst:
    421:302724285:d=2023013112:VGRD:700 mb:1 hour fcst:
    422:303619576:d=2023013112:ABSV:700 mb:1 hour fcst:
    423:304473277:d=2023013112:CLWMR:700 mb:1 hour fcst:
    424:304617663:d=2023013112:ICMR:700 mb:1 hour fcst:
    425:304914548:d=2023013112:RWMR:700 mb:1 hour fcst:
    426:305023237:d=2023013112:SNMR:700 mb:1 hour fcst:
    427:305172880:d=2023013112:GRLE:700 mb:1 hour fcst:
    428:305208124:d=2023013112:O3MR:700 mb:1 hour fcst:
    429:306470205:d=2023013112:HGT:750 mb:1 hour fcst:
    430:307337579:d=2023013112:TMP:750 mb:1 hour fcst:
    431:308116826:d=2023013112:RH:750 mb:1 hour fcst:
    432:308954187:d=2023013112:TCDC:750 mb:1 hour fcst:
    433:309353416:d=2023013112:SPFH:750 mb:1 hour fcst:
    434:310635894:d=2023013112:VVEL:750 mb:1 hour fcst:
    435:311830356:d=2023013112:DZDT:750 mb:1 hour fcst:
    436:312991820:d=2023013112:UGRD:750 mb:1 hour fcst:
    437:313900421:d=2023013112:VGRD:750 mb:1 hour fcst:
    438:314809062:d=2023013112:ABSV:750 mb:1 hour fcst:
    439:315675557:d=2023013112:CLWMR:750 mb:1 hour fcst:
    440:315856287:d=2023013112:ICMR:750 mb:1 hour fcst:
    441:316151245:d=2023013112:RWMR:750 mb:1 hour fcst:
    442:316280026:d=2023013112:SNMR:750 mb:1 hour fcst:
    443:316432960:d=2023013112:GRLE:750 mb:1 hour fcst:
    444:316471749:d=2023013112:O3MR:750 mb:1 hour fcst:
    445:317726406:d=2023013112:HGT:800 mb:1 hour fcst:
    446:318606757:d=2023013112:TMP:800 mb:1 hour fcst:
    447:319418031:d=2023013112:RH:800 mb:1 hour fcst:
    448:320269673:d=2023013112:TCDC:800 mb:1 hour fcst:
    449:320705319:d=2023013112:SPFH:800 mb:1 hour fcst:
    450:322022128:d=2023013112:VVEL:800 mb:1 hour fcst:
    451:323230457:d=2023013112:DZDT:800 mb:1 hour fcst:
    452:324389429:d=2023013112:UGRD:800 mb:1 hour fcst:
    453:325307621:d=2023013112:VGRD:800 mb:1 hour fcst:
    454:326227460:d=2023013112:ABSV:800 mb:1 hour fcst:
    455:327115986:d=2023013112:CLWMR:800 mb:1 hour fcst:
    456:327359174:d=2023013112:ICMR:800 mb:1 hour fcst:
    457:327703096:d=2023013112:RWMR:800 mb:1 hour fcst:
    458:327861359:d=2023013112:SNMR:800 mb:1 hour fcst:
    459:328022316:d=2023013112:GRLE:800 mb:1 hour fcst:
    460:328066557:d=2023013112:O3MR:800 mb:1 hour fcst:
    461:329314295:d=2023013112:HGT:850 mb:1 hour fcst:
    462:330213774:d=2023013112:TMP:850 mb:1 hour fcst:
    463:331059942:d=2023013112:RH:850 mb:1 hour fcst:
    464:331931842:d=2023013112:TCDC:850 mb:1 hour fcst:
    465:332451514:d=2023013112:SPFH:850 mb:1 hour fcst:
    466:333671676:d=2023013112:VVEL:850 mb:1 hour fcst:
    467:334889719:d=2023013112:DZDT:850 mb:1 hour fcst:
    468:336049138:d=2023013112:UGRD:850 mb:1 hour fcst:
    469:336986955:d=2023013112:VGRD:850 mb:1 hour fcst:
    470:337925850:d=2023013112:ABSV:850 mb:1 hour fcst:
    471:338844226:d=2023013112:CLWMR:850 mb:1 hour fcst:
    472:339225033:d=2023013112:ICMR:850 mb:1 hour fcst:
    473:339577470:d=2023013112:RWMR:850 mb:1 hour fcst:
    474:339802542:d=2023013112:SNMR:850 mb:1 hour fcst:
    475:339967148:d=2023013112:GRLE:850 mb:1 hour fcst:
    476:340029597:d=2023013112:O3MR:850 mb:1 hour fcst:
    477:341268579:d=2023013112:HGT:900 mb:1 hour fcst:
    478:342190575:d=2023013112:TMP:900 mb:1 hour fcst:
    479:343047385:d=2023013112:RH:900 mb:1 hour fcst:
    480:343915787:d=2023013112:TCDC:900 mb:1 hour fcst:
    481:344469487:d=2023013112:SPFH:900 mb:1 hour fcst:
    482:345694608:d=2023013112:VVEL:900 mb:1 hour fcst:
    483:346903053:d=2023013112:DZDT:900 mb:1 hour fcst:
    484:348048285:d=2023013112:UGRD:900 mb:1 hour fcst:
    485:348993474:d=2023013112:VGRD:900 mb:1 hour fcst:
    486:349940379:d=2023013112:ABSV:900 mb:1 hour fcst:
    487:350872236:d=2023013112:CLWMR:900 mb:1 hour fcst:
    488:351242536:d=2023013112:ICMR:900 mb:1 hour fcst:
    489:351569258:d=2023013112:RWMR:900 mb:1 hour fcst:
    490:351831961:d=2023013112:SNMR:900 mb:1 hour fcst:
    491:351977948:d=2023013112:GRLE:900 mb:1 hour fcst:
    492:352033663:d=2023013112:O3MR:900 mb:1 hour fcst:
    493:353242056:d=2023013112:HGT:925 mb:1 hour fcst:
    494:354179804:d=2023013112:TMP:925 mb:1 hour fcst:
    495:355034052:d=2023013112:RH:925 mb:1 hour fcst:
    496:355888843:d=2023013112:TCDC:925 mb:1 hour fcst:
    497:356456518:d=2023013112:SPFH:925 mb:1 hour fcst:
    498:357680132:d=2023013112:VVEL:925 mb:1 hour fcst:
    499:358876974:d=2023013112:DZDT:925 mb:1 hour fcst:
    500:360006292:d=2023013112:UGRD:925 mb:1 hour fcst:
    501:360947391:d=2023013112:VGRD:925 mb:1 hour fcst:
    502:361893403:d=2023013112:ABSV:925 mb:1 hour fcst:
    503:362823931:d=2023013112:CLWMR:925 mb:1 hour fcst:
    504:363133424:d=2023013112:ICMR:925 mb:1 hour fcst:
    505:363434411:d=2023013112:RWMR:925 mb:1 hour fcst:
    506:363726862:d=2023013112:SNMR:925 mb:1 hour fcst:
    507:363860420:d=2023013112:GRLE:925 mb:1 hour fcst:
    508:363911398:d=2023013112:O3MR:925 mb:1 hour fcst:
    509:365102607:d=2023013112:HGT:950 mb:1 hour fcst:
    510:366054841:d=2023013112:TMP:950 mb:1 hour fcst:
    511:366906995:d=2023013112:RH:950 mb:1 hour fcst:
    512:367743568:d=2023013112:TCDC:950 mb:1 hour fcst:
    513:368225112:d=2023013112:SPFH:950 mb:1 hour fcst:
    514:369445377:d=2023013112:VVEL:950 mb:1 hour fcst:
    515:370614707:d=2023013112:DZDT:950 mb:1 hour fcst:
    516:371713177:d=2023013112:UGRD:950 mb:1 hour fcst:
    517:372660147:d=2023013112:VGRD:950 mb:1 hour fcst:
    518:373611282:d=2023013112:ABSV:950 mb:1 hour fcst:
    519:374540832:d=2023013112:CLWMR:950 mb:1 hour fcst:
    520:374757131:d=2023013112:ICMR:950 mb:1 hour fcst:
    521:375051198:d=2023013112:RWMR:950 mb:1 hour fcst:
    522:375337230:d=2023013112:SNMR:950 mb:1 hour fcst:
    523:375438270:d=2023013112:GRLE:950 mb:1 hour fcst:
    524:375480425:d=2023013112:O3MR:950 mb:1 hour fcst:
    525:376654274:d=2023013112:HINDEX:surface:1 hour fcst:
    526:376851501:d=2023013112:HGT:975 mb:1 hour fcst:
    527:377823083:d=2023013112:TMP:975 mb:1 hour fcst:
    528:378674896:d=2023013112:RH:975 mb:1 hour fcst:
    529:379488943:d=2023013112:TCDC:975 mb:1 hour fcst:
    530:379871144:d=2023013112:SPFH:975 mb:1 hour fcst:
    531:381080088:d=2023013112:VVEL:975 mb:1 hour fcst:
    532:382183669:d=2023013112:DZDT:975 mb:1 hour fcst:
    533:383212191:d=2023013112:UGRD:975 mb:1 hour fcst:
    534:384169872:d=2023013112:VGRD:975 mb:1 hour fcst:
    535:385124239:d=2023013112:ABSV:975 mb:1 hour fcst:
    536:386051439:d=2023013112:CLWMR:975 mb:1 hour fcst:
    537:386180367:d=2023013112:ICMR:975 mb:1 hour fcst:
    538:386402694:d=2023013112:RWMR:975 mb:1 hour fcst:
    539:386661387:d=2023013112:SNMR:975 mb:1 hour fcst:
    540:386729789:d=2023013112:GRLE:975 mb:1 hour fcst:
    541:386767242:d=2023013112:O3MR:975 mb:1 hour fcst:
    542:387924842:d=2023013112:TMP:1000 mb:1 hour fcst:
    543:388780554:d=2023013112:RH:1000 mb:1 hour fcst:
    544:389571395:d=2023013112:TCDC:1000 mb:1 hour fcst:
    545:389801524:d=2023013112:SPFH:1000 mb:1 hour fcst:
    546:391007206:d=2023013112:VVEL:1000 mb:1 hour fcst:
    547:391988429:d=2023013112:DZDT:1000 mb:1 hour fcst:
    548:392891482:d=2023013112:UGRD:1000 mb:1 hour fcst:
    549:393854216:d=2023013112:VGRD:1000 mb:1 hour fcst:
    550:394801104:d=2023013112:ABSV:1000 mb:1 hour fcst:
    551:395721065:d=2023013112:CLWMR:1000 mb:1 hour fcst:
    552:395769094:d=2023013112:ICMR:1000 mb:1 hour fcst:
    553:395895276:d=2023013112:RWMR:1000 mb:1 hour fcst:
    554:396078889:d=2023013112:SNMR:1000 mb:1 hour fcst:
    555:396103988:d=2023013112:GRLE:1000 mb:1 hour fcst:
    556:396136071:d=2023013112:O3MR:1000 mb:1 hour fcst:
    557:397283656:d=2023013112:MSLET:mean sea level:1 hour fcst:
    558:398277624:d=2023013112:HGT:1000 mb:1 hour fcst:
    559:399273825:d=2023013112:REFD:4000 m above ground:1 hour fcst:
    560:399563172:d=2023013112:REFD:1000 m above ground:1 hour fcst:
    561:400348879:d=2023013112:PRES:surface:1 hour fcst:
    562:401188120:d=2023013112:HGT:surface:1 hour fcst:
    563:401680563:d=2023013112:TMP:surface:1 hour fcst:
    564:402254571:d=2023013112:TSOIL:0-0.1 m below ground:1 hour fcst:
    565:402871679:d=2023013112:SOILW:0-0.1 m below ground:1 hour fcst:
    566:403231890:d=2023013112:SOILL:0-0.1 m below ground:1 hour fcst:
    567:403581681:d=2023013112:TSOIL:0.1-0.4 m below ground:1 hour fcst:
    568:404178045:d=2023013112:SOILW:0.1-0.4 m below ground:1 hour fcst:
    569:404539184:d=2023013112:SOILL:0.1-0.4 m below ground:1 hour fcst:
    570:404894230:d=2023013112:TSOIL:0.4-1 m below ground:1 hour fcst:
    571:405436072:d=2023013112:SOILW:0.4-1 m below ground:1 hour fcst:
    572:405796704:d=2023013112:SOILL:0.4-1 m below ground:1 hour fcst:
    573:406154958:d=2023013112:TSOIL:1-2 m below ground:1 hour fcst:
    574:406691877:d=2023013112:SOILW:1-2 m below ground:1 hour fcst:
    575:407047625:d=2023013112:SOILL:1-2 m below ground:1 hour fcst:
    576:407405067:d=2023013112:CNWAT:surface:1 hour fcst:
    577:407724194:d=2023013112:WEASD:surface:1 hour fcst:
    578:408251116:d=2023013112:SNOD:surface:1 hour fcst:
    579:408764983:d=2023013112:PEVPR:surface:1 hour fcst:
    580:409277415:d=2023013112:ICETK:surface:1 hour fcst:
    581:409372348:d=2023013112:TMP:2 m above ground:1 hour fcst:
    582:410247238:d=2023013112:SPFH:2 m above ground:1 hour fcst:
    583:411430441:d=2023013112:DPT:2 m above ground:1 hour fcst:
    584:412350799:d=2023013112:RH:2 m above ground:1 hour fcst:
    585:413118767:d=2023013112:APTMP:2 m above ground:1 hour fcst:
    586:414059589:d=2023013112:TMAX:2 m above ground:0-1 hour max fcst:
    587:414919099:d=2023013112:TMIN:2 m above ground:0-1 hour min fcst:
    588:415788976:d=2023013112:UGRD:10 m above ground:1 hour fcst:
    589:416753062:d=2023013112:VGRD:10 m above ground:1 hour fcst:
    590:417692320:d=2023013112:ICEG:10 m above mean sea level:1 hour fcst:
    591:417706976:d=2023013112:CPOFP:surface:1 hour fcst:
    592:418298312:d=2023013112:CPRAT:surface:1 hour fcst:
    593:418979309:d=2023013112:PRATE:surface:1 hour fcst:
    594:419577237:d=2023013112:CPRAT:surface:0-1 hour ave fcst:
    595:420305340:d=2023013112:PRATE:surface:0-1 hour ave fcst:
    596:420948246:d=2023013112:APCP:surface:0-1 hour acc fcst:
    597:421181409:d=2023013112:APCP:surface:0-1 hour acc fcst:
    598:421414572:d=2023013112:ACPCP:surface:0-1 hour acc fcst:
    599:421587818:d=2023013112:ACPCP:surface:0-1 hour acc fcst:
    600:421761064:d=2023013112:WATR:surface:0-1 hour acc fcst:
    601:422045773:d=2023013112:CSNOW:surface:1 hour fcst:
    602:422085225:d=2023013112:CICEP:surface:1 hour fcst:
    603:422085662:d=2023013112:CFRZR:surface:1 hour fcst:
    604:422086305:d=2023013112:CRAIN:surface:1 hour fcst:
    605:422195194:d=2023013112:CSNOW:surface:0-1 hour ave fcst:
    606:422229832:d=2023013112:CICEP:surface:0-1 hour ave fcst:
    607:422230317:d=2023013112:CFRZR:surface:0-1 hour ave fcst:
    608:422230971:d=2023013112:CRAIN:surface:0-1 hour ave fcst:
    609:422330933:d=2023013112:LHTFL:surface:0-1 hour ave fcst:
    610:422914443:d=2023013112:SHTFL:surface:0-1 hour ave fcst:
    611:423826820:d=2023013112:GFLUX:surface:0-1 hour ave fcst:
    612:424349376:d=2023013112:UFLX:surface:0-1 hour ave fcst:
    613:425060871:d=2023013112:VFLX:surface:0-1 hour ave fcst:
    614:425740387:d=2023013112:SFCR:surface:1 hour fcst:
    615:426240655:d=2023013112:FRICV:surface:1 hour fcst:
    616:427176251:d=2023013112:U-GWD:surface:0-1 hour ave fcst:
    617:427467762:d=2023013112:V-GWD:surface:0-1 hour ave fcst:
    618:427754515:d=2023013112:VEG:surface:1 hour fcst:
    619:428016360:d=2023013112:SOTYP:surface:1 hour fcst:
    620:428314819:d=2023013112:WILT:surface:1 hour fcst:
    621:428676692:d=2023013112:FLDCP:surface:1 hour fcst:
    622:429043843:d=2023013112:SUNSD:surface:1 hour fcst:
    623:429240333:d=2023013112:LFTX:surface:1 hour fcst:
    624:429790213:d=2023013112:CAPE:surface:1 hour fcst:
    625:430307218:d=2023013112:CIN:surface:1 hour fcst:
    626:430585479:d=2023013112:PWAT:entire atmosphere (considered as a single layer):1 hour fcst:
    627:431758252:d=2023013112:CWAT:entire atmosphere (considered as a single layer):1 hour fcst:
    628:432699365:d=2023013112:RH:entire atmosphere (considered as a single layer):1 hour fcst:
    629:433289955:d=2023013112:TOZNE:entire atmosphere (considered as a single layer):1 hour fcst:
    630:433898420:d=2023013112:LCDC:low cloud layer:1 hour fcst:
    631:434711549:d=2023013112:LCDC:low cloud layer:0-1 hour ave fcst:
    632:435482165:d=2023013112:MCDC:middle cloud layer:1 hour fcst:
    633:436086918:d=2023013112:MCDC:middle cloud layer:0-1 hour ave fcst:
    634:436668226:d=2023013112:HCDC:high cloud layer:1 hour fcst:
    635:437414847:d=2023013112:HCDC:high cloud layer:0-1 hour ave fcst:
    636:438191011:d=2023013112:TCDC:entire atmosphere:1 hour fcst:
    637:439032020:d=2023013112:TCDC:entire atmosphere:0-1 hour ave fcst:
    638:439819670:d=2023013112:HGT:cloud ceiling:1 hour fcst:
    639:440976899:d=2023013112:PRES:convective cloud bottom level:1 hour fcst:
    640:441540043:d=2023013112:PRES:low cloud bottom level:0-1 hour ave fcst:
    641:442761413:d=2023013112:PRES:middle cloud bottom level:0-1 hour ave fcst:
    642:443778870:d=2023013112:PRES:high cloud bottom level:0-1 hour ave fcst:
    643:445073616:d=2023013112:PRES:convective cloud top level:1 hour fcst:
    644:445691110:d=2023013112:PRES:low cloud top level:0-1 hour ave fcst:
    645:446947666:d=2023013112:PRES:middle cloud top level:0-1 hour ave fcst:
    646:447923088:d=2023013112:PRES:high cloud top level:0-1 hour ave fcst:
    647:449224684:d=2023013112:TMP:low cloud top level:0-1 hour ave fcst:
    648:450147507:d=2023013112:TMP:middle cloud top level:0-1 hour ave fcst:
    649:450930059:d=2023013112:TMP:high cloud top level:0-1 hour ave fcst:
    650:452008916:d=2023013112:TCDC:convective cloud layer:1 hour fcst:
    651:452745578:d=2023013112:TCDC:boundary layer cloud layer:0-1 hour ave fcst:
    652:453496009:d=2023013112:CWORK:entire atmosphere (considered as a single layer):0-1 hour ave fcst:
    653:453827261:d=2023013112:DSWRF:surface:0-1 hour ave fcst:
    654:454604474:d=2023013112:DLWRF:surface:0-1 hour ave fcst:
    655:455608566:d=2023013112:USWRF:surface:0-1 hour ave fcst:
    656:456281754:d=2023013112:ULWRF:surface:0-1 hour ave fcst:
    657:457019941:d=2023013112:USWRF:top of atmosphere:0-1 hour ave fcst:
    658:457803022:d=2023013112:ULWRF:top of atmosphere:0-1 hour ave fcst:
    659:458770531:d=2023013112:HLCY:3000-0 m above ground:1 hour fcst:
    660:459444706:d=2023013112:USTM:6000-0 m above ground:1 hour fcst:
    661:460425245:d=2023013112:VSTM:6000-0 m above ground:1 hour fcst:
    662:461388429:d=2023013112:PRES:tropopause:1 hour fcst:
    663:462773144:d=2023013112:ICAHT:tropopause:1 hour fcst:
    664:464088290:d=2023013112:HGT:tropopause:1 hour fcst:
    665:465393265:d=2023013112:TMP:tropopause:1 hour fcst:
    666:466357608:d=2023013112:UGRD:tropopause:1 hour fcst:
    667:467058696:d=2023013112:VGRD:tropopause:1 hour fcst:
    668:467750973:d=2023013112:VWSH:tropopause:1 hour fcst:
    669:468314684:d=2023013112:PRES:max wind:1 hour fcst:
    670:469926093:d=2023013112:ICAHT:max wind:1 hour fcst:
    671:471580113:d=2023013112:HGT:max wind:1 hour fcst:
    672:473246424:d=2023013112:UGRD:max wind:1 hour fcst:
    673:473970989:d=2023013112:VGRD:max wind:1 hour fcst:
    674:474735239:d=2023013112:TMP:max wind:1 hour fcst:
    675:475982897:d=2023013112:UGRD:20 m above ground:1 hour fcst:
    676:476944523:d=2023013112:VGRD:20 m above ground:1 hour fcst:
    677:477885191:d=2023013112:UGRD:30 m above ground:1 hour fcst:
    678:478855654:d=2023013112:VGRD:30 m above ground:1 hour fcst:
    679:479804901:d=2023013112:UGRD:40 m above ground:1 hour fcst:
    680:480775710:d=2023013112:VGRD:40 m above ground:1 hour fcst:
    681:481727058:d=2023013112:UGRD:50 m above ground:1 hour fcst:
    682:482699258:d=2023013112:VGRD:50 m above ground:1 hour fcst:
    683:483656626:d=2023013112:TMP:80 m above ground:1 hour fcst:
    684:484507036:d=2023013112:SPFH:80 m above ground:1 hour fcst:
    685:485791880:d=2023013112:PRES:80 m above ground:1 hour fcst:
    686:486626863:d=2023013112:UGRD:80 m above ground:1 hour fcst:
    687:487598457:d=2023013112:VGRD:80 m above ground:1 hour fcst:
    688:488557961:d=2023013112:TMP:100 m above ground:1 hour fcst:
    689:489405527:d=2023013112:UGRD:100 m above ground:1 hour fcst:
    690:490376124:d=2023013112:VGRD:100 m above ground:1 hour fcst:
    691:491335841:d=2023013112:TMP:1829 m above mean sea level:1 hour fcst:
    692:492226414:d=2023013112:UGRD:1829 m above mean sea level:1 hour fcst:
    693:493108697:d=2023013112:VGRD:1829 m above mean sea level:1 hour fcst:
    694:493991579:d=2023013112:TMP:2743 m above mean sea level:1 hour fcst:
    695:494743297:d=2023013112:UGRD:2743 m above mean sea level:1 hour fcst:
    696:495626179:d=2023013112:VGRD:2743 m above mean sea level:1 hour fcst:
    697:496508656:d=2023013112:TMP:3658 m above mean sea level:1 hour fcst:
    698:497249549:d=2023013112:UGRD:3658 m above mean sea level:1 hour fcst:
    699:498146023:d=2023013112:VGRD:3658 m above mean sea level:1 hour fcst:
    700:499036685:d=2023013112:HGT:0C isotherm:1 hour fcst:
    701:499928812:d=2023013112:RH:0C isotherm:1 hour fcst:
    702:500756288:d=2023013112:HGT:highest tropospheric freezing level:1 hour fcst:
    703:501648569:d=2023013112:RH:highest tropospheric freezing level:1 hour fcst:
    704:502473744:d=2023013112:TMP:30-0 mb above ground:1 hour fcst:
    705:503313375:d=2023013112:RH:30-0 mb above ground:1 hour fcst:
    706:504088876:d=2023013112:SPFH:30-0 mb above ground:1 hour fcst:
    707:505368861:d=2023013112:UGRD:30-0 mb above ground:1 hour fcst:
    708:506328006:d=2023013112:VGRD:30-0 mb above ground:1 hour fcst:
    709:507275270:d=2023013112:4LFTX:surface:1 hour fcst:
    710:507799931:d=2023013112:CAPE:180-0 mb above ground:1 hour fcst:
    711:508273378:d=2023013112:CIN:180-0 mb above ground:1 hour fcst:
    712:508572953:d=2023013112:HPBL:surface:1 hour fcst:
    713:509899002:d=2023013112:RH:0.33-1 sigma layer:1 hour fcst:
    714:510626330:d=2023013112:RH:0.44-1 sigma layer:1 hour fcst:
    715:511343174:d=2023013112:RH:0.72-0.94 sigma layer:1 hour fcst:
    716:512115993:d=2023013112:RH:0.44-0.72 sigma layer:1 hour fcst:
    717:512907808:d=2023013112:TMP:0.995 sigma level:1 hour fcst:
    718:513773814:d=2023013112:POT:0.995 sigma level:1 hour fcst:
    719:514270307:d=2023013112:RH:0.995 sigma level:1 hour fcst:
    720:515081118:d=2023013112:UGRD:0.995 sigma level:1 hour fcst:
    721:516065534:d=2023013112:VGRD:0.995 sigma level:1 hour fcst:
    722:517031747:d=2023013112:VVEL:0.995 sigma level:1 hour fcst:
    723:517972276:d=2023013112:CAPE:90-0 mb above ground:1 hour fcst:
    724:518409795:d=2023013112:CIN:90-0 mb above ground:1 hour fcst:
    725:518724058:d=2023013112:CAPE:255-0 mb above ground:1 hour fcst:
    726:519184509:d=2023013112:CIN:255-0 mb above ground:1 hour fcst:
    727:519455598:d=2023013112:PLPL:255-0 mb above ground:1 hour fcst:
    728:520336154:d=2023013112:LAND:surface:1 hour fcst:
    729:520368190:d=2023013112:ICEC:surface:1 hour fcst:
    730:520473621:d=2023013112:ALBDO:surface:0-1 hour ave fcst:
    731:520934179:d=2023013112:ICETMP:surface:1 hour fcst:
    732:521107085:d=2023013112:UGRD:PV=2e-06 (Km^2/kg/s) surface:1 hour fcst:
    733:521781284:d=2023013112:VGRD:PV=2e-06 (Km^2/kg/s) surface:1 hour fcst:
    734:522438877:d=2023013112:TMP:PV=2e-06 (Km^2/kg/s) surface:1 hour fcst:
    735:523086187:d=2023013112:HGT:PV=2e-06 (Km^2/kg/s) surface:1 hour fcst:
    736:524261197:d=2023013112:PRES:PV=2e-06 (Km^2/kg/s) surface:1 hour fcst:
    737:525398078:d=2023013112:VWSH:PV=2e-06 (Km^2/kg/s) surface:1 hour fcst:
    738:525905703:d=2023013112:UGRD:PV=-2e-06 (Km^2/kg/s) surface:1 hour fcst:
    739:526569877:d=2023013112:VGRD:PV=-2e-06 (Km^2/kg/s) surface:1 hour fcst:
    740:527217160:d=2023013112:TMP:PV=-2e-06 (Km^2/kg/s) surface:1 hour fcst:
    741:527862111:d=2023013112:HGT:PV=-2e-06 (Km^2/kg/s) surface:1 hour fcst:
    742:529018036:d=2023013112:PRES:PV=-2e-06 (Km^2/kg/s) surface:1 hour fcst:
    743:530132660:d=2023013112:VWSH:PV=-2e-06 (Km^2/kg/s) surface:1 hour fcst:
**/

    public function getSymbol(float $cloud_cover_in_percent,
            float $precipitation_in_mm, float $temperature_in_celsius, bool $thunder,
            bool $fog): int
    {
        $clouds = $this->getCloudiness($cloud_cover_in_percent);
        $precipitationDroplets = $this->getPrecipitations($precipitation_in_mm);

        $phase = 0;
        if ( $precipitationDroplets > 0 )
        $phase = $this->getPrecipitationPhase($temperature_in_celsius);
        $isThunder = $thunder and $precipitationDroplets > 0;
        $isFog = $fog and $precipitationDroplets == 0;

        return $this->getCodeBis($clouds, $precipitationDroplets, $phase, $isThunder, $isFog);
    }

    /**
     * @param int $cloudCover
     * @param int $precipitationDroplets
     * @param int $precipitationPhase
     * @param int $thunder
     * @param bool $fog
     * @return int
     */
    public function getCodeBis(int $cloudCover, int $precipitationDroplets, int $precipitationPhase, int $thunder, bool $fog): int
    {
        $ret =  \App\Enum\WeatherSymbol::Error;

        if ( $fog )
            return  \App\Enum\WeatherSymbol::Fog;

        switch ( $cloudCover )
        {
            case 0:
                $ret = \App\Enum\WeatherSymbol::Sun;
                break;
            case 1:
                $ret =  \App\Enum\WeatherSymbol::LightCloud;;
                break;
            case 2:
                $ret =  \App\Enum\WeatherSymbol::PartlyCloud;;
                break;
            case 3:
                $ret =  \App\Enum\WeatherSymbol::Cloud;;
                break;
            default:
                throw new Exception('Internal error cloud');
        }

        if ($ret ==  \App\Enum\WeatherSymbol::Cloud)
            switch ( $precipitationDroplets )
            {
                case 0:
                    break;
                case 1:
                    $ret =  \App\Enum\WeatherSymbol::Drizzle;;
                    break;
                case 2:
                    $ret =  \App\Enum\WeatherSymbol::LightRain;;
                    break;
                case 3:
                    $ret =  \App\Enum\WeatherSymbol::Rain;;
                    break;
                default:
                    throw new Exception('internal error precipitations');
            }
        else {
            switch ( $precipitationDroplets )
            {
                case 0:
                    break;
                case 1:
                    $ret =  \App\Enum\WeatherSymbol::DrizzleSun;;
                    break;
                case 2:
                    $ret =  \App\Enum\WeatherSymbol::LightRainSun;;
                    break;
                case 3:
                    $ret =  \App\Enum\WeatherSymbol::RainSun;;
                    break;
                default:
                    throw new Exception("internal error: precipitation");
            }
        }

        if ($ret == \App\Enum\WeatherSymbol::Error)
            throw new Exception('Internal error: thunder and precipitations');

        return $ret;
    }

    public function getCode(float $wetBulbTemperature, $temperature, $thunder, $fog, $cloudCover, int $precipitationDroplets): int
    {
        $precipitationPhase = 0;
        if ( $precipitationDroplets > 0 )
        {
            if ( $wetBulbTemperature != 'undefined' )
                $precipitationPhase = $this->getPrecipitationPhaseFromWetBulb($wetBulbTemperature);
            else
                $precipitationPhase = $this->getPrecipitationPhase($temperature);
        }
        $thunder = $thunder and $precipitationDroplets > 0;
       $fog =  $fog and $precipitationDroplets == 0;

        return getCode_($cloudCover, $precipitationDroplets, $precipitationPhase, $thunder, $fog);
    }

    public function getCloudiness($cloud_cover_in_percent): int
    {
        if ($cloud_cover_in_percent < 0 or $cloud_cover_in_percent > 100)
        {
            throw new Exception('Invalid value for cloud cover');
        }

        if ($cloud_cover_in_percent <= 13)
            return 0;
        else if ($cloud_cover_in_percent <= 38)
            return 1;
        else if ($cloud_cover_in_percent <= 86)
            return 2;
        else
            return 3;
    }

    public function precipitation_limits($hours)
    {
        $limits_1h = [0.1, 0.25, 0.95];
	    $limits_6h = [0.5, 0.95, 4.95];

	$ret = [];

	for ($i = 0; $i < 3; $i++)
	{
        $low = $limits_1h[$i];
		$high = $limits_6h[$i];
		$step = ($high - $low) / 5;
		$value = ($step * ($hours - 1)) + $low;
		array_push($ret, $value);
	}

	return $ret;
}

    public function getPrecipitation($precipitation_in_mm)
    {
        if ($precipitation_in_mm < 0)
            throw new Exception("Precipitation cannot be below 0");

       $limits = $this->precipitation_limits($hours);

        for ($droplets = 3; $droplets >= 0; --$droplets)
            if ($precipitation_in_mm >= $limits[$droplets])
                break;

        return $droplets;
    }

    public function getPrecipitationPhase($temperature_in_celsius): int
    {
        if( $temperature_in_celsius <= 0.5 )
            return 2;
        else if( $temperature_in_celsius <= 1.5 )
            return 1;

        return 0;
    }
    public function getPrecipitationPhaseFromWetBulb($wet_bulb_temperature_in_celsius): int
    {
        if( $wet_bulb_temperature_in_celsius < 0 )
            return 2;
        else if( $wet_bulb_temperature_in_celsius <= 1 )
            return 1;

        return 0;
    }
}