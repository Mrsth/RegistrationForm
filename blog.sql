create table blog
(
    id      varchar(20) unique not null,
    tittle text,
    author  text,
    created text,
    updated text
);

create table blog_detail
(
    blog_detail_id varchar(20) not null,
    title text default '' null,
    image longblob,
    content text,
    created text,
    updated text,
    image_desc text,
    blog_id varchar(20) not null ,
    primary key (blog_detail_id),
    foreign key (blog_id) references blog (id)
        ON UPDATE CASCADE ON DELETE RESTRICT
);


