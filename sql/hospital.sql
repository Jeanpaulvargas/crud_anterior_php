CREATE TABLE cita (
    cita_id SERIAL PRIMARY KEY NOT NULL, 
    cit_fecha DATETIME YEAR TO MINUTE, 
    cit_situacion SMALLINT DEFAULT 1,
    cit_clinica_id INT,
    cit_paciente_id INT, 
    FOREIGN KEY (cit_clinica_id) REFERENCES clinicas(clinica_id), 
    FOREIGN KEY (cit_paciente_id) REFERENCES paciente(paciente_id) 
);

CREATE TABLE paciente (
    paciente_id SERIAL PRIMARY KEY NOT NULL,
    paci_nombres VARCHAR(55) NOT NULL,
    paci_apellidos VARCHAR(55) NOT NULL,
    paci_dpi VARCHAR (55) NOT NULL,
    paci_sexo VARCHAR(15) NOT NULL,
    paci_referido VARCHAR (10) NOT NULL,
    paciente_situacion SMALLINT DEFAULT 1
);

CREATE TABLE clinicas (
    clinica_id SERIAL PRIMARY KEY NOT NULL,
    clin_nombre VARCHAR(150) NOT NULL,
    clin_sala VARCHAR(25) NOT NULL,
    clinica_situacion SMALLINT DEFAULT 1,
    clin_medico_id INT,
    FOREIGN KEY (clin_medico_id) REFERENCES medico(medico_id)
);

CREATE TABLE medico (
    medico_id SERIAL PRIMARY KEY NOT NULL,
    medi_nombres VARCHAR(55) NOT NULL,
    medi_apellidos VARCHAR(55) NOT NULL,
    medi_especialidad VARCHAR(55) NOT NULL,
    medico_situacion SMALLINT DEFAULT 1
   
);





