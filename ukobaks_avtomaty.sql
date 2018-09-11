
-- 
-- `ukobaks_avtomaty`.`db_admin`
-- 
DROP TABLE IF EXISTS `db_admin`;
CREATE TABLE `db_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `ip` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 /*!40101 DEFAULT CHARSET=utf8 */;

INSERT INTO `db_admin` VALUES 
('1', 'ukobaks', '808099nnn', '0');

-- 
-- `ukobaks_avtomaty`.`db_bez`
-- 
DROP TABLE IF EXISTS `db_bez`;
CREATE TABLE `db_bez` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `bonus` varchar(80) NOT NULL,
  `url_icon` varchar(300) NOT NULL,
  `url_obzor` varchar(300) NOT NULL,
  `priority` int(3) NOT NULL,
  `casino` int(3) NOT NULL,
  `publish` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 /*!40101 DEFAULT CHARSET=utf8 */;

INSERT INTO `db_bez` VALUES 
('1', 'NetGameCasino', '20$ за регистрацию', '/images/casino-icon/17.png', '#', '1', '8', '0'),
('2', 'VegasRed', '10$ за регистрацию', '/images/casino-icon/08.png', '#', '2', '9', '0'),
('3', 'AzartPlay', '40FS за регистрацию', '/images/casino-icon/01.png', '/obzor-kazino-azartplay', '3', '1', '0'),
('4', 'Admiral', '40FS за регистрацию', '/images/casino-icon/02.png', '/obzor-kazino-admiral', '4', '2', '0'),
('5', 'SlotVoyager', '40FS за регистрацию', '/images/casino-icon/03.png', '/obzor-kazino-slotvoyager', '5', '3', '0'),
('6', 'DriftCasino', '30FS за регистрацию', '/images/casino-icon/06.png', '/obzor-kazino-drift', '6', '4', '0');

-- 
-- `ukobaks_avtomaty`.`db_followers`
-- 
DROP TABLE IF EXISTS `db_followers`;
CREATE TABLE `db_followers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM /*!40101 DEFAULT CHARSET=utf8 */;


-- 
-- `ukobaks_avtomaty`.`db_games`
-- 
DROP TABLE IF EXISTS `db_games`;
CREATE TABLE `db_games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_en` varchar(60) NOT NULL,
  `name_ru` varchar(60) NOT NULL,
  `breeder` int(3) NOT NULL,
  `url_iframe` varchar(300) NOT NULL,
  `url_sites` varchar(300) NOT NULL,
  `url_images` varchar(300) NOT NULL,
  `publish` int(1) NOT NULL,
  `new` int(1) NOT NULL,
  `casino` int(5) NOT NULL,
  `cat` int(2) NOT NULL,
  `nofollow` int(1) NOT NULL,
  `played` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 /*!40101 DEFAULT CHARSET=utf8 */;

INSERT INTO `db_games` VALUES 
('2', 'Attraction', 'Аттракцион', '9', 'https://promo.gamble2fun.com/slots/net_entertainment/attraction', '/slots/attraction', '/images/games/attraction.jpg', '0', '0', '4', '0', '1', '17'),
('3', 'Gonzos Quest', 'Гонзо Квест', '9', 'https://backendnetent.playfortuna8.com/frontend/renderFunGame/gameId:eldorado_sw/ru', '/slots/gonzos-quest', '/images/games/gonzos_quest.jpg', '0', '1', '1', '0', '0', '78'),
('4', 'Dead or Alive', 'Мертвый или живой', '9', 'https://backendnetent.playfortuna8.com/frontend/renderFunGame/gameId:deadoralive_sw/ru', '/slots/dead-or-alive', '/images/games/dead_or_alive.jpg', '0', '1', '4', '0', '0', '46'),
('5', 'Crime Scene', 'Место преступления', '9', 'https://promo.gamble2fun.com/slots/net_entertainment/crimescene', '/slots/crime-scene', '/images/games/crime_scene.jpg', '0', '0', '4', '0', '1', '4'),
('6', 'Frankenstein', 'Франкенштейн', '9', 'https://backendnetent.pfslot2.com/frontend/renderFunGame/gameId:frankenstein_sw/ru', '/slots/frankenstein', '/images/games/frankenstein.jpg', '0', '0', '4', '0', '1', '9'),
('7', 'Evolution', 'Эволюция', '9', 'https://promo.gamble2fun.com/slots/net_entertainment/evolution', '/slots/evolution', '/images/games/evolution.jpg', '0', '1', '4', '0', '1', '10'),
('8', 'Boom Brothers', '', '9', 'https://backendnetent.playfortuna8.com/frontend/renderFunGame/gameId:boombrothers_sw/ru', '/slots/boom-brothers', '/images/games/boom_brothers.jpg', '0', '1', '4', '0', '0', '26'),
('9', 'Crusade of Fortune', 'Крестовый поход удачи', '9', 'https://promo.gamble2fun.com/slots/net_entertainment/crusaders', '/slots/crusade_of_fortune', '/images/games/crusade_of_fortune.jpg', '0', '0', '4', '0', '1', '0'),
('10', 'Black Lagoon', 'Черная лагуна', '9', 'https://backendnetent.playfortuna8.com/frontend/renderFunGame/gameId:blacklagoon_sw/ru', '/slots/black-lagoon', '/images/games/black_lagoon.jpg', '0', '1', '4', '0', '1', '12'),
('11', 'Starburst', '', '9', 'https://backendnetent.playfortuna8.com/frontend/renderFunGame/gameId:starburst_sw/ru', '/slots/starburst', '/images/games/starburst.jpg', '0', '0', '4', '0', '1', '7'),
('12', 'Thief', 'Воровка', '9', 'https://backendnetent.playfortuna8.com/frontend/renderFunGame/gameId:thief_sw/ru', '/slots/thief', '/images/games/thief.jpg', '0', '0', '4', '0', '1', '10'),
('13', 'Go Bananas', 'Вперед Бананы', '9', 'https://promo.gamble2fun.com/slots/net_entertainment/gobananas', '/slots/go-bananas', '/images/games/go_bananas.jpg', '0', '1', '4', '0', '0', '37'),
('14', 'Wonky Wabbits', 'Сумасшедшие кролики', '9', 'https://promo.gamble2fun.com/slots/net_entertainment/wonkywabbits', '/slots/wonky-wabbits', '/images/games/wonky_wabbits.jpg', '0', '1', '4', '0', '0', '24'),
('15', 'Space Wars', 'Космические войны', '9', 'https://backendnetent.playfortuna8.com/frontend/renderFunGame/gameId:spacewars_sw/ru', '/slots/space-wars', '/images/games/space_wars.jpg', '0', '0', '4', '0', '1', '6'),
('16', 'Ghost Pirates', 'Призраки пиратов', '9', 'https://promo.gamble2fun.com/slots/net_entertainment/ghost_pirates', '/slots/ghost-pirates', '/images/games/ghost_pirates.jpg', '0', '0', '4', '0', '1', '2'),
('17', 'Dracula', 'Дракула', '9', 'https://backendnetent.playfortuna8.com/frontend/renderFunGame/gameId:dracula_sw/ru', '/slots/dracula', '/images/games/dracula.jpg', '0', '1', '4', '0', '1', '16'),
('18', 'Black Jack Pro - High', '', '9', 'https://backendnetent.pfslot1.com/frontend/renderFunGame/gameId:hrblackjack2-3h_sw/ru', '/blackjack/black-jack-pro-high-limit', '/images/games/black_jack_pro_high_limit.jpg', '0', '0', '7', '2', '1', '5'),
('19', 'Black Jack Pro - Low', '', '9', 'https://backendnetent.pfslot1.com/frontend/renderFunGame/gameId:lrblackjack2-3h_sw/ru', '/blackjack/black-jack-pro-low-limit', '/images/games/black_jack_pro_low_limit.jpg', '0', '0', '7', '2', '1', '3'),
('20', 'Black Jack Pro - Standard', '', '9', 'https://backendnetent.pfslot1.com/frontend/renderFunGame/gameId:lrblackjack2-3h_sw/ru', '/blackjack/black-jack-pro-standard-limit', '/images/games/black_jack_pro_standard_limit.jpg', '0', '0', '7', '2', '1', '0'),
('21', 'Black Jack Pro - Vip', '', '9', 'https://backendnetent.pfslot1.com/frontend/renderFunGame/gameId:vipblackjack2-3h_sw/ru', '/blackjack/black-jack-pro-vip-limit', '/images/games/black_jack_pro_vip_limit.jpg', '0', '0', '7', '2', '1', '7'),
('22', 'Hot as Hades', 'Горячий, как Аид', '7', 'https://redirector3.valueactive.eu/Casino/Default.aspx?applicationid=1023&theme=quickfiressl&usertype=5&sext1=demo&sext2=demo&csid=1866&serverid=1866&variant=MIT-Demo&gameid=HotAsHades&ul=ru', '/slots/hot-as-hades', '/images/games/hot_as_hades.jpg', '0', '0', '7', '0', '1', '7'),
('23', 'Big Bad Wolf', 'Большой плохой волк', '7', 'https://redirector3.valueactive.eu/Casino/Default.aspx?applicationid=1023&theme=quickfiressl&usertype=5&sext1=demo&sext2=demo&csid=1866&serverid=1866&variant=MIT-Demo&gameid=BigBadWolf&ul=ru', '/slots/big-bad-wolf', '/images/games/big_bad_wolf.jpg', '0', '0', '7', '0', '1', '10'),
('24', 'Dragons Myth', '', '7', 'https://redirector3.valueactive.eu/Casino/Default.aspx?applicationid=1023&theme=quickfiressl&usertype=5&sext1=demo&sext2=demo&csid=1866&serverid=1866&variant=MIT-Demo&gameid=DragonsMyth&ul=ru', '/slots/dragons-myth', '/images/games/dragons_myth.jpg', '0', '0', '7', '0', '1', '8'),
('25', 'Hitman', 'Хитман', '7', 'https://redirector3.valueactive.eu/Casino/Default.aspx?applicationid=1023&theme=quickfiressl&usertype=5&sext1=demo&sext2=demo&csid=1866&serverid=1866&variant=MIT-Demo&gameid=RubyHitman&ul=ru', '/slots/hitman', '/images/games/hitman.jpg', '0', '0', '7', '0', '1', '5'),
('26', 'American Roulette', 'Американская рулетка', '9', 'https://backendnetent.pfslot1.com/frontend/renderFunGame/gameId:americanroulette3_sw/ru', '/roulette/american-roulette', '/images/games/american_roulette.jpg', '0', '1', '7', '1', '0', '41'),
('27', 'European Roulette', 'Европейская рулетка', '9', 'https://backendnetent.pfslot1.com/frontend/renderFunGame/gameId:europeanroulette3_sw/ru', '/roulette/european-roulette', '/images/games/european_roulette.jpg', '0', '1', '7', '1', '0', '26'),
('28', 'The French Roulette', 'Французская рулетка', '9', 'https://backendnetent.pfslot1.com/frontend/renderFunGame/gameId:frenchroulette3_sw/ru', '/roulette/the-french-roulette', '/images/games/the_french_roulette.jpg', '0', '1', '7', '1', '0', '11');

-- 
-- `ukobaks_avtomaty`.`db_link`
-- 
DROP TABLE IF EXISTS `db_link`;
CREATE TABLE `db_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `link` varchar(300) NOT NULL,
  `link_redirect` varchar(300) NOT NULL,
  `link_bonus` varchar(300) NOT NULL,
  `redirect` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 /*!40101 DEFAULT CHARSET=utf8 */;

INSERT INTO `db_link` VALUES 
('1', 'AzartPlay', 'http://rda1ne21.com/?az122016=', 'http://casino-redirect.com/alt/playfortuna/registration/render?77a24b887e77813fc8cd2030b32ba583', 'http://rda1ne21.com/promo/land28?az130469=', '1'),
('2', 'Admiral', 'http://rea3ne21.com/?qs=ad122017', 'http://casino-redirect.com/alt/playfortuna/registration/render?77a24b887e77813fc8cd2030b32ba583', 'http://rea3ne21.com/promo/land26?qs=ad130470', '1'),
('3', 'SlotVoyager', 'http://rrk2ne21.com/?lid122018=', 'http://casino-redirect.com/alt/playfortuna/registration/render?77a24b887e77813fc8cd2030b32ba583', 'http://rrk2ne21.com/promo/land2?lid130471=', '1'),
('4', 'DriftCasino', 'http://my-games-list.com/promo/land2?dc122771=', 'http://casino-redirect.com/alt/playfortuna/registration/render?77a24b887e77813fc8cd2030b32ba583', 'http://my-games-list.com/promo/land2?dc122673=', '1'),
('5', 'FrankCasino', 'http://game-paradiseclub.com/offers/signup?fc=fc122020', 'http://casino-redirect.com/alt/playfortuna/registration/render?77a24b887e77813fc8cd2030b32ba583', 'http://game-paradiseclub.com/promo/registration?fc=fc130472', '1'),
('6', 'CasinoKhan', 'http://dirkzne11.com/?kh122022=', 'http://casino-redirect.com/alt/playfortuna/registration/render?77a24b887e77813fc8cd2030b32ba583', 'http://dirkzne11.com/promo/land6?kh130473=', '1'),
('7', 'PlayFortuna', 'http://casino-redirect.com/alt/playfortuna/registration/render?77a24b887e77813fc8cd2030b32ba583', 'http://casino-redirect.com/alt/playfortuna/registration/render?77a24b887e77813fc8cd2030b32ba583', 'http://casino-redirect.com/alt/playfortuna/registration/render?77a24b887e77813fc8cd2030b32ba583', '0'),
('8', 'NetGameCasino', 'http://gambling-partners.com/ref/47725906/', 'http://gambling-partners.com/ref/47725906/', 'http://gambling-partners.com/ref/47725906/', '0'),
('9', 'VegasRed', 'http://online.123kim.info/promoRedirect?key=ej0yMTk2ODEyNTU2Jmw9NzQxMDAwMjkmcD0xMDQwOTE0', 'http://online.123kim.info/promoRedirect?key=ej0yMTk2ODEyNTU2Jmw9NzQxMDAwMjkmcD0xMDQwOTE0', 'http://online.123kim.info/promoRedirect?key=ej0yMTk2ODEyNTU2Jmw9NzQxMDAwMjkmcD0xMDQwOTE0', '0');

-- 
-- `ukobaks_avtomaty`.`db_top`
-- 
DROP TABLE IF EXISTS `db_top`;
CREATE TABLE `db_top` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `bonus` varchar(80) NOT NULL,
  `url_icon` varchar(300) NOT NULL,
  `url_obzor` varchar(300) NOT NULL,
  `priority` int(3) NOT NULL,
  `casino` int(3) NOT NULL,
  `publish` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 /*!40101 DEFAULT CHARSET=utf8 */;

INSERT INTO `db_top` VALUES 
('1', 'AzartPlay', '200% на депозит', '/images/casino-icon/01.png', '/obzor-kazino-azartplay', '1', '1', '0'),
('2', 'Admiral', 'до 300$ на депозит', '/images/casino-icon/02.png', '/obzor-kazino-admiral', '2', '2', '0'),
('3', 'SlotVoyager', 'до 500% к депозиту', '/images/casino-icon/03.png', '/obzor-kazino-slotvoyager', '3', '3', '0'),
('4', 'DriftCasino', '100% на депозит', '/images/casino-icon/06.png', '/obzor-kazino-drift', '4', '4', '0'),
('5', 'FrankCasino', '100$ к депозиту', '/images/casino-icon/04.png', '/obzor-kazino-frank', '5', '5', '0'),
('6', 'PlayFortuna', '500$ на депозит', '/images/casino-icon/18.png', '#', '2', '7', '0'),
('7', 'CasinoKhan', '200% на депозит', '/images/casino-icon/05.png', '/obzor-kazino-khan', '6', '6', '1');
