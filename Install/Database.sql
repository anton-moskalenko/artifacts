create table rune_quests
(
	key_quest varchar(17) not null,
	title varchar(100) not null,
	program text not null,
	goal varchar(250) not null,
	start timestamp not null,
	finish timestamp not null,
	status tinyint unsigned not null,
	type smallint unsigned not null,
	data json not null,
	constraint rune_quests_pk
		primary key (key_quest)
);