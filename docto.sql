--Data base Name doctor_midars--
--Sql Query For Table Structure--
--SQL Query For sketch--
create table sketch(id int PRIMARY KEY  AUTO_INCREMENT, Dispensary_Name varchar(100),name varchar(100),Degree_name varchar(100),select_language int,Designation varchar(100),Location varchar(100), Doctor_logo varchar(100),Doctor_image varchar(100),FOREIGN KEY(select_language)REFERENCES lan(lan_id));
--SQL Query For language Table--
create table lan(lan_id int not null AUTO_INCREMENT,language varchar(1000),PRIMARY KEY(lan_id));
--Insert value in lan table is required --
--this value for english language--
insert into lan(language)VALUES('Golden hands that heal, touch lives, and restore hope. Thank you, doctors, for 50 years of unwavering dedication.');
--this value for hindi language--
insert into lan(language)VALUES('सुनहरे हाथ जो चंगा करते हैं, जीवन को छूते हैं और आशा बहाल करते हैं। डॉक्टरों, 50 वर्षों के अटूट समर्पण के लिए धन्यवाद।');
--this value for marathi language--
insert into lan(language)VALUES('सोनेरी हात जे बरे करतात, जीवनाला स्पर्श करतात आणि आशा पुनर्संचयित करतात. डॉक्टरांनो, ५० वर्षांच्या अखंड समर्पणाबद्दल धन्यवाद.');
--this value for Gujarti language--
insert into lan(language)VALUES('સુવર્ણ હાથ જે સાજા કરે છે, જીવનને સ્પર્શે છે અને આશા પુનઃસ્થાપિત કરે છે. ડોકટરો, 50 વર્ષના અતૂટ સમર્પણ માટે આભાર.');
