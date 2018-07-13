#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: apqm_category
#------------------------------------------------------------

CREATE TABLE apqm_category(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (30) NOT NULL
	,CONSTRAINT apqm_category_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: apqm_country
#------------------------------------------------------------

CREATE TABLE apqm_country(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (100) NOT NULL
	,CONSTRAINT apqm_country_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: apqm_contentType
#------------------------------------------------------------

CREATE TABLE apqm_contentType(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (50) NOT NULL
	,CONSTRAINT apqm_contentType_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: apqm_contentShare
#------------------------------------------------------------

CREATE TABLE apqm_contentShare(
        id Int  Auto_increment  NOT NULL
	,CONSTRAINT apqm_contentShare_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: apqm_content
#------------------------------------------------------------

CREATE TABLE apqm_content(
        id                   Int  Auto_increment  NOT NULL ,
        name                 Varchar (100) NOT NULL ,
        datePublication      Date NOT NULL ,
        id_apqm_contentType  Int NOT NULL ,
        id_apqm_contentShare Int NOT NULL
	,CONSTRAINT apqm_content_PK PRIMARY KEY (id)

	,CONSTRAINT apqm_content_apqm_contentType_FK FOREIGN KEY (id_apqm_contentType) REFERENCES apqm_contentType(id)
	,CONSTRAINT apqm_content_apqm_contentShare0_FK FOREIGN KEY (id_apqm_contentShare) REFERENCES apqm_contentShare(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: apqm_user
#------------------------------------------------------------

CREATE TABLE apqm_user(
        id              Int  Auto_increment  NOT NULL ,
        lastname        Varchar (30) NOT NULL ,
        firstname       Varchar (30) NOT NULL ,
        userName        Varchar (30) NOT NULL ,
        mail            Varchar (60) NOT NULL ,
        phone           Integer NOT NULL ,
        password        Varchar (255) NOT NULL ,
        id_apqm_country Int NOT NULL ,
        id_apqm_content Int NOT NULL
	,CONSTRAINT apqm_user_PK PRIMARY KEY (id)

	,CONSTRAINT apqm_user_apqm_country_FK FOREIGN KEY (id_apqm_country) REFERENCES apqm_country(id)
	,CONSTRAINT apqm_user_apqm_content0_FK FOREIGN KEY (id_apqm_content) REFERENCES apqm_content(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: apqm_comments
#------------------------------------------------------------

CREATE TABLE apqm_comments(
        id              Int  Auto_increment  NOT NULL ,
        text            Text NOT NULL ,
        date            Date NOT NULL ,
        hour            Time NOT NULL ,
        id_apqm_content Int NOT NULL ,
        id_apqm_user    Int NOT NULL
	,CONSTRAINT apqm_comments_PK PRIMARY KEY (id)

	,CONSTRAINT apqm_comments_apqm_content_FK FOREIGN KEY (id_apqm_content) REFERENCES apqm_content(id)
	,CONSTRAINT apqm_comments_apqm_user0_FK FOREIGN KEY (id_apqm_user) REFERENCES apqm_user(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: apqm_contentMedia
#------------------------------------------------------------

CREATE TABLE apqm_contentMedia(
        id                   Int  Auto_increment  NOT NULL ,
        name                 Varchar (100) NOT NULL ,
        path                 Varchar (100) NOT NULL ,
        id_apqm_contentShare Int NOT NULL
	,CONSTRAINT apqm_contentMedia_PK PRIMARY KEY (id)

	,CONSTRAINT apqm_contentMedia_apqm_contentShare_FK FOREIGN KEY (id_apqm_contentShare) REFERENCES apqm_contentShare(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: apqm_contentText
#------------------------------------------------------------

CREATE TABLE apqm_contentText(
        id                   Int  Auto_increment  NOT NULL ,
        text                 Text NOT NULL ,
        id_apqm_contentShare Int NOT NULL
	,CONSTRAINT apqm_contentText_PK PRIMARY KEY (id)

	,CONSTRAINT apqm_contentText_apqm_contentShare_FK FOREIGN KEY (id_apqm_contentShare) REFERENCES apqm_contentShare(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: belong
#------------------------------------------------------------

CREATE TABLE belong(
        id           Int NOT NULL ,
        id_apqm_user Int NOT NULL
	,CONSTRAINT belong_PK PRIMARY KEY (id,id_apqm_user)

	,CONSTRAINT belong_apqm_category_FK FOREIGN KEY (id) REFERENCES apqm_category(id)
	,CONSTRAINT belong_apqm_user0_FK FOREIGN KEY (id_apqm_user) REFERENCES apqm_user(id)
)ENGINE=InnoDB;

