--
-- PostgreSQL database dump
--

-- Dumped from database version 10.1
-- Dumped by pg_dump version 10.1

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: DIRDEUPTAEB; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON DATABASE "DIRDEUPTAEB" IS 'Base de datos del sistema de proyecto III seccion IN3321';


--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

--
-- Name: asd; Type: TEXT SEARCH DICTIONARY; Schema: public; Owner: postgres
--

CREATE TEXT SEARCH DICTIONARY asd (
    TEMPLATE = pg_catalog.simple );


ALTER TEXT SEARCH DICTIONARY asd OWNER TO postgres;

--
-- Name: TEXT SEARCH DICTIONARY asd; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TEXT SEARCH DICTIONARY asd IS 'ASD';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: T_atleta; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "T_atleta" (
    cedula_atleta character varying(255) NOT NULL,
    nombres character varying(255) NOT NULL,
    apellidos character varying(255) NOT NULL,
    fecha_nacimiento date,
    direccion character varying(255),
    tel_movil character varying(255),
    tel_fijo character varying(255),
    correo character varying(255),
    sexo character varying(255),
    dir_foto character varying(255),
    dir_cedula character varying(255),
    status integer DEFAULT 1 NOT NULL
);


ALTER TABLE "T_atleta" OWNER TO postgres;

--
-- Name: TABLE "T_atleta"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE "T_atleta" IS 'Tabla de datos personales del atleta';


--
-- Name: COLUMN "T_atleta".cedula_atleta; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta".cedula_atleta IS 'cedula del atleta';


--
-- Name: COLUMN "T_atleta".nombres; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta".nombres IS 'nombres del atleta';


--
-- Name: COLUMN "T_atleta".apellidos; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta".apellidos IS 'apellidos del atleta';


--
-- Name: COLUMN "T_atleta".fecha_nacimiento; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta".fecha_nacimiento IS 'fecha de nacimiento';


--
-- Name: COLUMN "T_atleta".direccion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta".direccion IS 'direccion';


--
-- Name: COLUMN "T_atleta".tel_movil; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta".tel_movil IS 'telefono movil';


--
-- Name: COLUMN "T_atleta".tel_fijo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta".tel_fijo IS 'telefono fijo';


--
-- Name: COLUMN "T_atleta".correo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta".correo IS 'correo del atleta';


--
-- Name: COLUMN "T_atleta".sexo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta".sexo IS 'sexo del atleta';


--
-- Name: COLUMN "T_atleta".dir_foto; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta".dir_foto IS 'direccion de la carpeta que contiene la imagen en el servidor';


--
-- Name: COLUMN "T_atleta".dir_cedula; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta".dir_cedula IS 'direccion a la cedula en la carpeta del servidor';


--
-- Name: COLUMN "T_atleta".status; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta".status IS 'Estado del atleta; 0 para inactivo 1 para activo';


--
-- Name: T_atleta_academico; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "T_atleta_academico" (
    id_aa integer NOT NULL,
    trayecto character varying(10),
    "año_ingreso" character varying(20),
    dir_planilla character varying(255),
    dir_carnet character varying(255),
    cedula_atleta character varying(255),
    id_pnf integer
);


ALTER TABLE "T_atleta_academico" OWNER TO postgres;

--
-- Name: TABLE "T_atleta_academico"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE "T_atleta_academico" IS 'Tabla con los datos academicos del Atleta';


--
-- Name: COLUMN "T_atleta_academico".id_aa; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta_academico".id_aa IS 'indice de la tabla id atleta academico';


--
-- Name: COLUMN "T_atleta_academico".trayecto; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta_academico".trayecto IS 'trayecto academico actual';


--
-- Name: COLUMN "T_atleta_academico"."año_ingreso"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta_academico"."año_ingreso" IS 'año de ingreso del atleta a la universidad';


--
-- Name: COLUMN "T_atleta_academico".dir_planilla; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta_academico".dir_planilla IS 'ubicacion del archivo con la foto de la planilla de inscripcion del atleta';


--
-- Name: COLUMN "T_atleta_academico".dir_carnet; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta_academico".dir_carnet IS 'ubicacion del archivo con la imagen del carnet del atleta';


--
-- Name: COLUMN "T_atleta_academico".cedula_atleta; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta_academico".cedula_atleta IS 'Clave foranea con la cedula del atleta';


--
-- Name: COLUMN "T_atleta_academico".id_pnf; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta_academico".id_pnf IS 'Clave foranea con el id del PNF';


--
-- Name: T_atleta_academico_id_aa_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "T_atleta_academico_id_aa_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "T_atleta_academico_id_aa_seq" OWNER TO postgres;

--
-- Name: T_atleta_academico_id_aa_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE "T_atleta_academico_id_aa_seq" OWNED BY "T_atleta_academico".id_aa;


--
-- Name: T_atleta_cedula_atleta_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "T_atleta_cedula_atleta_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "T_atleta_cedula_atleta_seq" OWNER TO postgres;

--
-- Name: T_atleta_cedula_atleta_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE "T_atleta_cedula_atleta_seq" OWNED BY "T_atleta".cedula_atleta;


--
-- Name: T_atleta_disciplina; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "T_atleta_disciplina" (
    id_ad integer NOT NULL,
    cedula_atleta character varying(255),
    id_disciplina integer
);


ALTER TABLE "T_atleta_disciplina" OWNER TO postgres;

--
-- Name: TABLE "T_atleta_disciplina"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE "T_atleta_disciplina" IS 'Tabla con los atletas por disciplinas';


--
-- Name: COLUMN "T_atleta_disciplina".id_ad; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta_disciplina".id_ad IS 'indice la tabla: id atleta por disciplina';


--
-- Name: COLUMN "T_atleta_disciplina".cedula_atleta; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta_disciplina".cedula_atleta IS 'Clave foranea con la cedula del atleta';


--
-- Name: COLUMN "T_atleta_disciplina".id_disciplina; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta_disciplina".id_disciplina IS 'clave foranea con el id de la disciplina';


--
-- Name: T_atleta_disciplina_id_ad_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "T_atleta_disciplina_id_ad_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "T_atleta_disciplina_id_ad_seq" OWNER TO postgres;

--
-- Name: T_atleta_disciplina_id_ad_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE "T_atleta_disciplina_id_ad_seq" OWNED BY "T_atleta_disciplina".id_ad;


--
-- Name: T_atleta_ejecucion_pdc; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "T_atleta_ejecucion_pdc" (
    id_aep integer NOT NULL,
    fecha_ejecucion date,
    resultado character varying(255),
    cedula_atleta character varying(255),
    id_dp integer
);


ALTER TABLE "T_atleta_ejecucion_pdc" OWNER TO postgres;

--
-- Name: TABLE "T_atleta_ejecucion_pdc"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE "T_atleta_ejecucion_pdc" IS 'Tabla con los atletas por dia que participaron en el entrenamiento';


--
-- Name: COLUMN "T_atleta_ejecucion_pdc".id_aep; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta_ejecucion_pdc".id_aep IS 'indice de la tabla: id atleta ejecucion por dia';


--
-- Name: COLUMN "T_atleta_ejecucion_pdc".fecha_ejecucion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta_ejecucion_pdc".fecha_ejecucion IS 'dia que se realizo la sesion de entrenamiento';


--
-- Name: COLUMN "T_atleta_ejecucion_pdc".resultado; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta_ejecucion_pdc".resultado IS 'resultado evaluativo de forma cualitativa';


--
-- Name: COLUMN "T_atleta_ejecucion_pdc".cedula_atleta; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta_ejecucion_pdc".cedula_atleta IS 'cedula del atleta que ejecuto la sesion de entrenamiento';


--
-- Name: COLUMN "T_atleta_ejecucion_pdc".id_dp; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta_ejecucion_pdc".id_dp IS 'clave foranea con el id del dia por programa';


--
-- Name: T_atleta_ejecucion_pdc_id_aep_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "T_atleta_ejecucion_pdc_id_aep_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "T_atleta_ejecucion_pdc_id_aep_seq" OWNER TO postgres;

--
-- Name: T_atleta_ejecucion_pdc_id_aep_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE "T_atleta_ejecucion_pdc_id_aep_seq" OWNED BY "T_atleta_ejecucion_pdc".id_aep;


--
-- Name: T_atleta_medico; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "T_atleta_medico" (
    id_am integer NOT NULL,
    estatura real,
    peso real,
    tipo_sangre character varying(255),
    contacto_emergencia character varying(255),
    tel_contacto character varying(255),
    info_discapacidad character varying(255),
    observaciones character varying(255),
    cedula_atleta character varying(255),
    info_alergias character varying(255)
);


ALTER TABLE "T_atleta_medico" OWNER TO postgres;

--
-- Name: TABLE "T_atleta_medico"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE "T_atleta_medico" IS 'Tabla con los datos medicos del atelta';


--
-- Name: COLUMN "T_atleta_medico".id_am; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta_medico".id_am IS 'indice la tabla: id atleta medico';


--
-- Name: COLUMN "T_atleta_medico".estatura; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta_medico".estatura IS 'estatura del atleta';


--
-- Name: COLUMN "T_atleta_medico".peso; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta_medico".peso IS 'peso del atleta';


--
-- Name: COLUMN "T_atleta_medico".tipo_sangre; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta_medico".tipo_sangre IS 'tipo de sangre del atleta';


--
-- Name: COLUMN "T_atleta_medico".contacto_emergencia; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta_medico".contacto_emergencia IS 'nombre de la persona para llamar en caso de emergencia';


--
-- Name: COLUMN "T_atleta_medico".tel_contacto; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta_medico".tel_contacto IS 'Telefono de contacto de emergencia';


--
-- Name: COLUMN "T_atleta_medico".info_discapacidad; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta_medico".info_discapacidad IS 'Informacion de la discapacidad del atleta en caso de tenerla, sino el campo sera vacio';


--
-- Name: COLUMN "T_atleta_medico".observaciones; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta_medico".observaciones IS 'campo para observaciones medicas pertinentes';


--
-- Name: COLUMN "T_atleta_medico".cedula_atleta; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta_medico".cedula_atleta IS 'clave foranea con la cedula del atleta';


--
-- Name: COLUMN "T_atleta_medico".info_alergias; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta_medico".info_alergias IS 'informacion de las alergias del atleta en caso de tenerla';


--
-- Name: T_atleta_medico_id_am_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "T_atleta_medico_id_am_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "T_atleta_medico_id_am_seq" OWNER TO postgres;

--
-- Name: T_atleta_medico_id_am_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE "T_atleta_medico_id_am_seq" OWNED BY "T_atleta_medico".id_am;


--
-- Name: T_atleta_prueba; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "T_atleta_prueba" (
    id_ap integer NOT NULL,
    fecha date,
    medicion character varying(255),
    cedula_atleta character varying(255),
    id_prueba integer
);


ALTER TABLE "T_atleta_prueba" OWNER TO postgres;

--
-- Name: TABLE "T_atleta_prueba"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE "T_atleta_prueba" IS 'Tabla con los datos de la ejecucion y resultados de la prueba por atleta';


--
-- Name: COLUMN "T_atleta_prueba".id_ap; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta_prueba".id_ap IS 'indice de la tabla: id de atleta por prueba';


--
-- Name: COLUMN "T_atleta_prueba".fecha; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta_prueba".fecha IS 'fecha de la ejecucion o aplicacion de la prueba por el atleta';


--
-- Name: COLUMN "T_atleta_prueba".medicion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta_prueba".medicion IS 'resultado de la prueba por atleta';


--
-- Name: COLUMN "T_atleta_prueba".cedula_atleta; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta_prueba".cedula_atleta IS 'clave foranea con la cedula del atleta que realizo la prueba';


--
-- Name: COLUMN "T_atleta_prueba".id_prueba; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta_prueba".id_prueba IS 'clave foranea con el id de la prueba o test';


--
-- Name: T_atleta_prueba_id_ap_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "T_atleta_prueba_id_ap_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "T_atleta_prueba_id_ap_seq" OWNER TO postgres;

--
-- Name: T_atleta_prueba_id_ap_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE "T_atleta_prueba_id_ap_seq" OWNED BY "T_atleta_prueba".id_ap;


--
-- Name: T_dia_pdc; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "T_dia_pdc" (
    id_dp integer NOT NULL,
    fecha timestamp without time zone,
    tecnica integer,
    tactica integer,
    fisico integer,
    velocidad integer,
    id_pdc integer,
    psicologico integer
);


ALTER TABLE "T_dia_pdc" OWNER TO postgres;

--
-- Name: TABLE "T_dia_pdc"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE "T_dia_pdc" IS 'Tabla con los datos POR DIA de las planificaciones';


--
-- Name: COLUMN "T_dia_pdc".id_dp; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_dia_pdc".id_dp IS 'indice de la tabla: id por dia por programa';


--
-- Name: COLUMN "T_dia_pdc".fecha; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_dia_pdc".fecha IS 'fecha con el dia pautado para la planificacion';


--
-- Name: COLUMN "T_dia_pdc".tecnica; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_dia_pdc".tecnica IS 'carga en porcentaje para este aspecto del entrenamiento';


--
-- Name: COLUMN "T_dia_pdc".tactica; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_dia_pdc".tactica IS 'carga en porcentaje para este aspecto del entrenamiento';


--
-- Name: COLUMN "T_dia_pdc".fisico; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_dia_pdc".fisico IS 'carga en porcentaje para este aspecto del entrenamiento';


--
-- Name: COLUMN "T_dia_pdc".velocidad; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_dia_pdc".velocidad IS 'carga en porcentaje para este aspecto del entrenamiento';


--
-- Name: COLUMN "T_dia_pdc".id_pdc; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_dia_pdc".id_pdc IS 'clave foranea con ID o codigo del programa directo de competencia';


--
-- Name: COLUMN "T_dia_pdc".psicologico; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_dia_pdc".psicologico IS 'carga en porcentaje para este aspecto del entrenamiento';


--
-- Name: T_atleta_tiempo_pdc_id_atp_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "T_atleta_tiempo_pdc_id_atp_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "T_atleta_tiempo_pdc_id_atp_seq" OWNER TO postgres;

--
-- Name: T_atleta_tiempo_pdc_id_atp_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE "T_atleta_tiempo_pdc_id_atp_seq" OWNED BY "T_dia_pdc".id_dp;


--
-- Name: T_atleta_uniforme; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "T_atleta_uniforme" (
    id_au integer NOT NULL,
    talla_franela character varying(20),
    talla_pantalon character varying(20),
    talla_short character varying(20),
    talla_zapato character varying(20),
    talla_gorra character varying(20),
    talla_chaqueta character varying(20),
    cedula_atleta character varying(255)
);


ALTER TABLE "T_atleta_uniforme" OWNER TO postgres;

--
-- Name: TABLE "T_atleta_uniforme"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE "T_atleta_uniforme" IS 'Tabla con los datos del uniforme del atleta';


--
-- Name: COLUMN "T_atleta_uniforme".id_au; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta_uniforme".id_au IS 'indice la tabla: id atleta uniforme';


--
-- Name: COLUMN "T_atleta_uniforme".talla_franela; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta_uniforme".talla_franela IS 'Talla de la franela';


--
-- Name: COLUMN "T_atleta_uniforme".talla_pantalon; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta_uniforme".talla_pantalon IS 'Talla del pantalon';


--
-- Name: COLUMN "T_atleta_uniforme".talla_short; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta_uniforme".talla_short IS 'Talla del Short o pantalon corto';


--
-- Name: COLUMN "T_atleta_uniforme".talla_zapato; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta_uniforme".talla_zapato IS 'Talla de los zapatos';


--
-- Name: COLUMN "T_atleta_uniforme".talla_gorra; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta_uniforme".talla_gorra IS 'Talla de la gorra';


--
-- Name: COLUMN "T_atleta_uniforme".talla_chaqueta; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta_uniforme".talla_chaqueta IS 'Talla de la chaqueta';


--
-- Name: COLUMN "T_atleta_uniforme".cedula_atleta; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_atleta_uniforme".cedula_atleta IS 'Clave foranea con la cedula del atleta';


--
-- Name: T_atleta_uniforme_id_au_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "T_atleta_uniforme_id_au_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "T_atleta_uniforme_id_au_seq" OWNER TO postgres;

--
-- Name: T_atleta_uniforme_id_au_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE "T_atleta_uniforme_id_au_seq" OWNED BY "T_atleta_uniforme".id_au;


--
-- Name: T_disciplina; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "T_disciplina" (
    id_disciplina integer NOT NULL,
    nombre character varying(255) NOT NULL,
    tipo_disciplina character varying(255),
    status integer DEFAULT 1 NOT NULL
);


ALTER TABLE "T_disciplina" OWNER TO postgres;

--
-- Name: TABLE "T_disciplina"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE "T_disciplina" IS 'Tabla con los datos y la descripcion de las disciplinas';


--
-- Name: COLUMN "T_disciplina".id_disciplina; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_disciplina".id_disciplina IS 'indice la tabla: id disciplina';


--
-- Name: COLUMN "T_disciplina".nombre; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_disciplina".nombre IS 'nombre de la disciplina';


--
-- Name: COLUMN "T_disciplina".tipo_disciplina; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_disciplina".tipo_disciplina IS 'tipo o clasificacion de la disciplina: Registro y marca, Pelota, Combate, Mesa.';


--
-- Name: T_disciplina_id_disciplina_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "T_disciplina_id_disciplina_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "T_disciplina_id_disciplina_seq" OWNER TO postgres;

--
-- Name: T_disciplina_id_disciplina_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE "T_disciplina_id_disciplina_seq" OWNED BY "T_disciplina".id_disciplina;


--
-- Name: T_equipo_tecnico; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "T_equipo_tecnico" (
    cedula_et character varying(255) NOT NULL,
    nombres character varying(255),
    apellidos character varying(255),
    cargo character varying(255),
    tel_movil character varying(255),
    correo character varying(255),
    dir_foto character varying(255),
    dir_cedula character varying(255),
    status integer
);


ALTER TABLE "T_equipo_tecnico" OWNER TO postgres;

--
-- Name: TABLE "T_equipo_tecnico"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE "T_equipo_tecnico" IS 'Tabla con los datos de los integrantes del equipo tecnico';


--
-- Name: COLUMN "T_equipo_tecnico".cedula_et; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_equipo_tecnico".cedula_et IS 'cedula del integrante del equipo tecnico';


--
-- Name: COLUMN "T_equipo_tecnico".nombres; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_equipo_tecnico".nombres IS 'nombres del integrante del equipo tecnico';


--
-- Name: COLUMN "T_equipo_tecnico".apellidos; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_equipo_tecnico".apellidos IS 'apellidos del integrante del equipo tecnico';


--
-- Name: COLUMN "T_equipo_tecnico".cargo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_equipo_tecnico".cargo IS 'cargo que desempeña el integrante del equipo tecnico';


--
-- Name: COLUMN "T_equipo_tecnico".tel_movil; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_equipo_tecnico".tel_movil IS 'telefono movil de contacto del integrante del equipo tecnico';


--
-- Name: COLUMN "T_equipo_tecnico".correo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_equipo_tecnico".correo IS 'correo electronico del integrante del equipo tecnico';


--
-- Name: COLUMN "T_equipo_tecnico".dir_foto; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_equipo_tecnico".dir_foto IS 'direccion de la ubicacion de la foto del integrante del equipo tecnico';


--
-- Name: COLUMN "T_equipo_tecnico".dir_cedula; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_equipo_tecnico".dir_cedula IS 'direccion de la ubicacion de la imagen de la cedula del integrante del equipo tecnico';


--
-- Name: COLUMN "T_equipo_tecnico".status; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_equipo_tecnico".status IS 'estado: 1 para activo, 0 para inactivo';


--
-- Name: T_equipo_tecnico_disciplina; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "T_equipo_tecnico_disciplina" (
    id_etd integer NOT NULL,
    cedula_et character varying(255),
    id_disciplina integer
);


ALTER TABLE "T_equipo_tecnico_disciplina" OWNER TO postgres;

--
-- Name: TABLE "T_equipo_tecnico_disciplina"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE "T_equipo_tecnico_disciplina" IS 'Tabla con los integrantes del integrante del equipo tecnico por disciplina en la que esta asignado';


--
-- Name: COLUMN "T_equipo_tecnico_disciplina".id_etd; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_equipo_tecnico_disciplina".id_etd IS 'indice de la tabla: id equipo tecnico por disciplina';


--
-- Name: COLUMN "T_equipo_tecnico_disciplina".cedula_et; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_equipo_tecnico_disciplina".cedula_et IS 'clave foranea con la cedula del integrante del equipo tecnico';


--
-- Name: COLUMN "T_equipo_tecnico_disciplina".id_disciplina; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_equipo_tecnico_disciplina".id_disciplina IS 'clave foranea con el id de la disciplina';


--
-- Name: T_equipo_tecnico_disciplina_id_etd_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "T_equipo_tecnico_disciplina_id_etd_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "T_equipo_tecnico_disciplina_id_etd_seq" OWNER TO postgres;

--
-- Name: T_equipo_tecnico_disciplina_id_etd_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE "T_equipo_tecnico_disciplina_id_etd_seq" OWNED BY "T_equipo_tecnico_disciplina".id_etd;


--
-- Name: T_pdc; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "T_pdc" (
    id_pdc integer NOT NULL,
    fecha_inicio timestamp without time zone,
    fecha_fin timestamp without time zone,
    tecnica integer,
    tactica integer,
    fisico integer,
    psicologico integer,
    velocidad integer,
    id_disciplina integer,
    tipo_pdc character varying(255),
    nombre_pdc character varying(255) NOT NULL,
    descripcion character varying(255) NOT NULL
);


ALTER TABLE "T_pdc" OWNER TO postgres;

--
-- Name: TABLE "T_pdc"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE "T_pdc" IS 'Tabla con los datos, descripcion y carracteristicas de los Programas directos de competencia (PDC).';


--
-- Name: COLUMN "T_pdc".id_pdc; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_pdc".id_pdc IS 'indice de la tabla: id o codigo del programa directo de competencia PDC';


--
-- Name: COLUMN "T_pdc".fecha_inicio; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_pdc".fecha_inicio IS 'Fecha de inicio del programa';


--
-- Name: COLUMN "T_pdc".fecha_fin; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_pdc".fecha_fin IS 'Fecha de finalizacion del programa';


--
-- Name: COLUMN "T_pdc".tecnica; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_pdc".tecnica IS 'carga en porcentaje para este aspecto del entrenamiento';


--
-- Name: COLUMN "T_pdc".tactica; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_pdc".tactica IS 'carga en porcentaje para este aspecto del entrenamiento';


--
-- Name: COLUMN "T_pdc".fisico; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_pdc".fisico IS 'carga en porcentaje para este aspecto del entrenamiento';


--
-- Name: COLUMN "T_pdc".psicologico; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_pdc".psicologico IS 'carga en porcentaje para este aspecto del entrenamiento';


--
-- Name: COLUMN "T_pdc".velocidad; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_pdc".velocidad IS 'carga en porcentaje para este aspecto del entrenamiento';


--
-- Name: COLUMN "T_pdc".id_disciplina; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_pdc".id_disciplina IS 'clave foranea con el ID o codigo de la disciplina a la que pertenece el entremanieto';


--
-- Name: COLUMN "T_pdc".tipo_pdc; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_pdc".tipo_pdc IS 'tipo de entrenamiento puede ser; PREPARATORIO, PRE-COMPETENCIA, COMPETITIVO, POST-COMPETENCIA';


--
-- Name: COLUMN "T_pdc".nombre_pdc; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_pdc".nombre_pdc IS 'Nombre del programa';


--
-- Name: COLUMN "T_pdc".descripcion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_pdc".descripcion IS 'Descripcion del PDC o programa directo de competencia';


--
-- Name: T_pdc_id_pdc_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "T_pdc_id_pdc_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "T_pdc_id_pdc_seq" OWNER TO postgres;

--
-- Name: T_pdc_id_pdc_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE "T_pdc_id_pdc_seq" OWNED BY "T_pdc".id_pdc;


--
-- Name: T_pnf; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "T_pnf" (
    id_pnf integer NOT NULL,
    nombre character varying(255) NOT NULL,
    coordinador character varying(255) NOT NULL
);


ALTER TABLE "T_pnf" OWNER TO postgres;

--
-- Name: TABLE "T_pnf"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE "T_pnf" IS 'Tabla de Programas Nacionales de Formacion (PNF)';


--
-- Name: COLUMN "T_pnf".id_pnf; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_pnf".id_pnf IS 'indice de la tabla';


--
-- Name: COLUMN "T_pnf".nombre; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_pnf".nombre IS 'Nombre del PNF';


--
-- Name: COLUMN "T_pnf".coordinador; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_pnf".coordinador IS 'Primer nombre y Primer apellido del Coordinador del PNF';


--
-- Name: T_pnf_id_pnf_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "T_pnf_id_pnf_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "T_pnf_id_pnf_seq" OWNER TO postgres;

--
-- Name: T_pnf_id_pnf_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE "T_pnf_id_pnf_seq" OWNED BY "T_pnf".id_pnf;


--
-- Name: T_prueba; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "T_prueba" (
    id_prueba integer NOT NULL,
    nombre character varying(255),
    descripcion character varying(255),
    tipo_prueba character varying(255),
    objetivo character varying(255),
    unidad character varying(255),
    rango1 integer,
    rango2 integer,
    rango3 integer,
    rango4 integer,
    status integer DEFAULT 1 NOT NULL
);


ALTER TABLE "T_prueba" OWNER TO postgres;

--
-- Name: TABLE "T_prueba"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE "T_prueba" IS 'Tabla con la informacion y caracteristicas de los TEST o pruebas que realizaran los entrenadores a los atletas';


--
-- Name: COLUMN "T_prueba".id_prueba; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_prueba".id_prueba IS 'indice de la tabla: identificacion o codigo de la prueba';


--
-- Name: COLUMN "T_prueba".nombre; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_prueba".nombre IS 'nombre de la prueba o TEST';


--
-- Name: COLUMN "T_prueba".descripcion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_prueba".descripcion IS 'descripcion de la prueba o TEST, como debe ser ejecutado, indicaciones';


--
-- Name: COLUMN "T_prueba".tipo_prueba; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_prueba".tipo_prueba IS 'Capacidad fisica que emplea la prueba puede ser: VELOCIDAD, FUERZA, RESISTENCIA, FLEXIBILIDAD, EQUILIBRIO.';


--
-- Name: COLUMN "T_prueba".objetivo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_prueba".objetivo IS 'Breve descripcion del objetivo de la prueba: Ejemplo: Medir la fuerza-resistencia de los músculos lumbo-abdominales (test de abdominales superiores )';


--
-- Name: COLUMN "T_prueba".unidad; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_prueba".unidad IS 'unidad de medida de la prueba puede ser Centimetos, Metros, Kilometros, Segundos, Minutos.';


--
-- Name: COLUMN "T_prueba".rango1; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_prueba".rango1 IS 'Rango de referencia para la unidad de medida';


--
-- Name: COLUMN "T_prueba".rango2; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_prueba".rango2 IS 'Rango de referencia para la unidad de medida';


--
-- Name: COLUMN "T_prueba".rango3; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_prueba".rango3 IS 'Rango de referencia para la unidad de medida';


--
-- Name: COLUMN "T_prueba".rango4; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_prueba".rango4 IS 'Rango de referencia para la unidad de medida';


--
-- Name: T_prueba_id_prueba_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "T_prueba_id_prueba_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "T_prueba_id_prueba_seq" OWNER TO postgres;

--
-- Name: T_prueba_id_prueba_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE "T_prueba_id_prueba_seq" OWNED BY "T_prueba".id_prueba;


--
-- Name: rol; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE rol (
    id_rol integer NOT NULL,
    rol character varying(32)
);


ALTER TABLE rol OWNER TO postgres;

--
-- Name: TABLE rol; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE rol IS 'Tabla descripcion de roles';


--
-- Name: rol_id_rol_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE rol_id_rol_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE rol_id_rol_seq OWNER TO postgres;

--
-- Name: rol_id_rol_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE rol_id_rol_seq OWNED BY rol.id_rol;


--
-- Name: roles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE roles (
    id_roles integer NOT NULL,
    id_rol integer,
    id_usuario integer
);


ALTER TABLE roles OWNER TO postgres;

--
-- Name: TABLE roles; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE roles IS 'tabla con roles por usuario';


--
-- Name: roles_id_roles_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE roles_id_roles_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE roles_id_roles_seq OWNER TO postgres;

--
-- Name: roles_id_roles_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE roles_id_roles_seq OWNED BY roles.id_roles;


--
-- Name: usuarios; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE usuarios (
    id_usuario integer NOT NULL,
    nombre_usuario character varying(25) NOT NULL,
    password character varying(255) NOT NULL,
    correo character varying(32),
    status integer DEFAULT 1 NOT NULL
);


ALTER TABLE usuarios OWNER TO postgres;

--
-- Name: TABLE usuarios; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE usuarios IS 'tabla de usuarios del sistema';


--
-- Name: COLUMN usuarios.status; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN usuarios.status IS 'Estado del usuario; 0 para inactivo 1 para activo';


--
-- Name: usuarios_id_usuario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE usuarios_id_usuario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE usuarios_id_usuario_seq OWNER TO postgres;

--
-- Name: usuarios_id_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE usuarios_id_usuario_seq OWNED BY usuarios.id_usuario;


--
-- Name: T_atleta_academico id_aa; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_atleta_academico" ALTER COLUMN id_aa SET DEFAULT nextval('"T_atleta_academico_id_aa_seq"'::regclass);


--
-- Name: T_atleta_disciplina id_ad; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_atleta_disciplina" ALTER COLUMN id_ad SET DEFAULT nextval('"T_atleta_disciplina_id_ad_seq"'::regclass);


--
-- Name: T_atleta_ejecucion_pdc id_aep; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_atleta_ejecucion_pdc" ALTER COLUMN id_aep SET DEFAULT nextval('"T_atleta_ejecucion_pdc_id_aep_seq"'::regclass);


--
-- Name: T_atleta_medico id_am; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_atleta_medico" ALTER COLUMN id_am SET DEFAULT nextval('"T_atleta_medico_id_am_seq"'::regclass);


--
-- Name: T_atleta_prueba id_ap; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_atleta_prueba" ALTER COLUMN id_ap SET DEFAULT nextval('"T_atleta_prueba_id_ap_seq"'::regclass);


--
-- Name: T_atleta_uniforme id_au; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_atleta_uniforme" ALTER COLUMN id_au SET DEFAULT nextval('"T_atleta_uniforme_id_au_seq"'::regclass);


--
-- Name: T_dia_pdc id_dp; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_dia_pdc" ALTER COLUMN id_dp SET DEFAULT nextval('"T_atleta_tiempo_pdc_id_atp_seq"'::regclass);


--
-- Name: T_disciplina id_disciplina; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_disciplina" ALTER COLUMN id_disciplina SET DEFAULT nextval('"T_disciplina_id_disciplina_seq"'::regclass);


--
-- Name: T_equipo_tecnico_disciplina id_etd; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_equipo_tecnico_disciplina" ALTER COLUMN id_etd SET DEFAULT nextval('"T_equipo_tecnico_disciplina_id_etd_seq"'::regclass);


--
-- Name: T_pdc id_pdc; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_pdc" ALTER COLUMN id_pdc SET DEFAULT nextval('"T_pdc_id_pdc_seq"'::regclass);


--
-- Name: T_pnf id_pnf; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_pnf" ALTER COLUMN id_pnf SET DEFAULT nextval('"T_pnf_id_pnf_seq"'::regclass);


--
-- Name: T_prueba id_prueba; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_prueba" ALTER COLUMN id_prueba SET DEFAULT nextval('"T_prueba_id_prueba_seq"'::regclass);


--
-- Name: rol id_rol; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY rol ALTER COLUMN id_rol SET DEFAULT nextval('rol_id_rol_seq'::regclass);


--
-- Name: roles id_roles; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY roles ALTER COLUMN id_roles SET DEFAULT nextval('roles_id_roles_seq'::regclass);


--
-- Name: usuarios id_usuario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY usuarios ALTER COLUMN id_usuario SET DEFAULT nextval('usuarios_id_usuario_seq'::regclass);


--
-- Data for Name: T_atleta; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "T_atleta" (cedula_atleta, nombres, apellidos, fecha_nacimiento, direccion, tel_movil, tel_fijo, correo, sexo, dir_foto, dir_cedula, status) FROM stdin;
20350027	Alvaro Sofi	Tirado Gil	1992-04-20	Carrera 13 esq. Calle 18	04164645556		alvarot027@gmail.com	masculino	assets/img/img_foto_atleta/203500272017-08-27-1310.jpg	assets/img/img_ced_atleta/20350027referencia compra de legion para homer de robert.jpg	1
2	Segundoa	DOS	2018-03-01	casa	2	2	ddos@gmail.com	masculino	assets/img/img_foto_atleta/2VirtualBox_2018-03-06_20-28-29.png	assets/img/img_ced_atleta/2firefox_2018-03-24_12-03-48.png	1
42142141	asdada	DOS	2018-04-14	asda	12411	213131	a@gmail.com	masculino	assets/img/img_foto_atleta/42142141firefox_2018-03-18_01-53-16.png	assets/img/img_ced_atleta/42142141firefox_2018-03-24_12-03-48.png	1
\.


--
-- Data for Name: T_atleta_academico; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "T_atleta_academico" (id_aa, trayecto, "año_ingreso", dir_planilla, dir_carnet, cedula_atleta, id_pnf) FROM stdin;
16	3	2015	assets/img/img_planilla_atleta/20350027VirtualBox_2018-03-06_20-28-29.png	assets/img/img_carnet_atleta/20350027firefox_2018-03-18_01-53-16.png	20350027	7
17	3	2010	assets/img/img_planilla_atleta/2firefox_2018-03-18_01-53-16.png	assets/img/img_carnet_atleta/2firefox_2018-03-18_01-53-16.png	2	2
18	3	2002	assets/img/img_planilla_atleta/42142141firefox_2018-03-24_12-04-25.png	assets/img/img_carnet_atleta/42142141VirtualBox_2018-03-06_20-28-29.png	42142141	1
\.


--
-- Data for Name: T_atleta_disciplina; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "T_atleta_disciplina" (id_ad, cedula_atleta, id_disciplina) FROM stdin;
7	20350027	31
8	20350027	33
90	2	16
91	2	18
92	42142141	16
\.


--
-- Data for Name: T_atleta_ejecucion_pdc; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "T_atleta_ejecucion_pdc" (id_aep, fecha_ejecucion, resultado, cedula_atleta, id_dp) FROM stdin;
\.


--
-- Data for Name: T_atleta_medico; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "T_atleta_medico" (id_am, estatura, peso, tipo_sangre, contacto_emergencia, tel_contacto, info_discapacidad, observaciones, cedula_atleta, info_alergias) FROM stdin;
12	1.72000003	60		Maria gil	02512370787			20350027	
13	1.73000002	60		d	2		alergico a	2	asd
14	1	1	B+	asd	1221321			42142141	
\.


--
-- Data for Name: T_atleta_prueba; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "T_atleta_prueba" (id_ap, fecha, medicion, cedula_atleta, id_prueba) FROM stdin;
\.


--
-- Data for Name: T_atleta_uniforme; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "T_atleta_uniforme" (id_au, talla_franela, talla_pantalon, talla_short, talla_zapato, talla_gorra, talla_chaqueta, cedula_atleta) FROM stdin;
11	S	M	S	41	S	M	20350027
12	XS	XS	XS	45	XL	XXL	2
13							42142141
\.


--
-- Data for Name: T_dia_pdc; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "T_dia_pdc" (id_dp, fecha, tecnica, tactica, fisico, velocidad, id_pdc, psicologico) FROM stdin;
51	2018-04-02 00:00:00	\N	\N	\N	\N	18	\N
52	2018-04-03 06:00:00	\N	\N	\N	\N	18	\N
53	2018-04-04 06:00:00	\N	\N	\N	\N	18	\N
54	2018-04-05 06:00:00	\N	\N	\N	\N	18	\N
55	2018-04-06 06:00:00	\N	\N	\N	\N	18	\N
56	2018-04-07 06:00:00	\N	\N	\N	\N	18	\N
57	2018-04-08 06:00:00	\N	\N	\N	\N	18	\N
58	2018-04-09 06:00:00	\N	\N	\N	\N	18	\N
59	2018-04-10 06:00:00	\N	\N	\N	\N	18	\N
60	2018-04-11 06:00:00	\N	\N	\N	\N	18	\N
61	2018-04-12 06:00:00	\N	\N	\N	\N	18	\N
62	2018-04-13 06:00:00	\N	\N	\N	\N	18	\N
63	2018-04-14 06:00:00	\N	\N	\N	\N	18	\N
64	2018-04-15 06:00:00	\N	\N	\N	\N	18	\N
65	2018-04-16 06:00:00	\N	\N	\N	\N	18	\N
66	2018-04-17 06:00:00	\N	\N	\N	\N	18	\N
67	2018-04-18 06:00:00	\N	\N	\N	\N	18	\N
68	2018-04-19 06:00:00	\N	\N	\N	\N	18	\N
69	2018-04-20 06:00:00	\N	\N	\N	\N	18	\N
70	2018-04-21 06:00:00	\N	\N	\N	\N	18	\N
71	2018-04-22 06:00:00	\N	\N	\N	\N	18	\N
\.


--
-- Data for Name: T_disciplina; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "T_disciplina" (id_disciplina, nombre, tipo_disciplina, status) FROM stdin;
16	Ajedrez Masculino	Mesa	1
17	Ajedrez Femenino	Mesa	1
18	Atletismo Masculino	Registro y Marca	1
19	Atletismo Femenino	Registro y Marca	1
23	Ciclismo Masculino	Registro y Marca	1
24	Ciclismo Femenino	Registro y Marca	1
25	Esgrima Masculino	Combate	1
26	Esgrima Femenino	Combate	1
31	Judo Masculino	Combate	1
32	Judo Femenino	Combate	1
33	Karate Do Masculino	Combate	1
34	Karate Do Femenino	Combate	1
36	Levantamiento de Pesas Masculino	Registro y Marca	1
37	Levantamiento de Pesas Femenino	Registro y Marca	1
38	Lucha Olimpica Masculino	Combate	1
39	Lucha Olimpica Femenino	Combate	1
40	Natación Masculino	Registro y Marca	1
41	Natación Femenino	Registro y Marca	1
44	Taekwondo Masculino	Combate	1
45	Taekwondo Femenino	Combate	1
48	Tenis de Mesa Masculino	Mesa	1
49	Tenis de Mesa Femenino	Mesa	1
50	Voleibol de Arena Masculino	Pelota	1
51	Voleibol Arena Femenino	Pelota	1
52	Voleibol Masculino	Pelota	1
53	Voleibol Femenino	Pelota	1
20	Baloncesto Masculino	Pelota	1
21	Baloncesto Femenino	Pelota	1
22	Béisbol	Pelota	1
27	Fútbol Masculino	Pelota	1
28	Fútbol Femenino	Pelota	1
29	Fútbol Sala Masculino	Pelota	1
30	Fútbol Sala Femenino	Pelota	1
35	Kickingball	Pelota	1
42	Sóftbol Masculino	Pelota	1
43	Sóftbol Femenino	Pelota	1
46	Tenis Masculino	Pelota	1
47	Tenis Femenino	Pelota	1
\.


--
-- Data for Name: T_equipo_tecnico; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "T_equipo_tecnico" (cedula_et, nombres, apellidos, cargo, tel_movil, correo, dir_foto, dir_cedula, status) FROM stdin;
\.


--
-- Data for Name: T_equipo_tecnico_disciplina; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "T_equipo_tecnico_disciplina" (id_etd, cedula_et, id_disciplina) FROM stdin;
\.


--
-- Data for Name: T_pdc; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "T_pdc" (id_pdc, fecha_inicio, fecha_fin, tecnica, tactica, fisico, psicologico, velocidad, id_disciplina, tipo_pdc, nombre_pdc, descripcion) FROM stdin;
18	2018-04-02 00:00:00	2018-04-23 00:01:00	20	20	20	20	20	16	Preparatorio	test 1	primera prueba
\.


--
-- Data for Name: T_pnf; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "T_pnf" (id_pnf, nombre, coordinador) FROM stdin;
1	PNF en Administracion	coordinador
2	PNF en Ciencias de la Información	coordinador
3	PNF en Contaduría Publica	coordinador
4	PNF en Turismo	coordinador
5	PNF en Agroalimentación	coordinador
6	PNF en Higiene y seguridad laboral	coordinador
7	PNF en Informática	Jehamar Lovera
8	PNF en Sistemas de calidad y ambiente	coordinador
9	PNF en Deportes	coordinador
\.


--
-- Data for Name: T_prueba; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "T_prueba" (id_prueba, nombre, descripcion, tipo_prueba, objetivo, unidad, rango1, rango2, rango3, rango4, status) FROM stdin;
1	carlos	fghjk	Resistencia	vbn	vb	5	6	7	8	1
2	jose	vbnm	Equilibrio	ghj	vbn	4	5	6	7	1
\.


--
-- Data for Name: rol; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY rol (id_rol, rol) FROM stdin;
1	Administrador
2	Usuario
\.


--
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY roles (id_roles, id_rol, id_usuario) FROM stdin;
3	1	4
12	1	13
13	1	14
20	2	21
24	1	25
1	2	1
2	1	2
19	2	20
5	1	6
\.


--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY usuarios (id_usuario, nombre_usuario, password, correo, status) FROM stdin;
4	Osmin	$2y$10$uaPjldZeqaQntNfKPc4ZA.dptrK7t7FpA8MrHLBX/sIfGN/EK55c.	osminprincipal@gmail.com	1
13	a	$2y$10$LYOx5fevRGcdrCjuYIVgsu1px4UK9Af2Hg35ZByiBB3Qvw8vvEJwW	a@g.com	1
14	Alvaro	$2y$10$q7CiSUnBZK69tvetA5i.h.rR0btcoyU3PUCUOe5PIKGy5JvxtMV9i	alvarot027@gmail.com	1
21	Wister	$2y$10$pIil43i0vJDJsrCgcB3JkObgC1iOWjh5jO1H5V/R7xoIPkPTineri	wister@gmail.com	1
25	prueba	$2y$10$toKI4Jc4pqtgPLI4XBCbA.t24qDhvYf6EtStUPbDc.TrSUppjDwVO	prueba@gmail.com	1
2	deb	$2y$10$rRGEu8ut0Sm6vGPLuDa04eQB6wgXO.D67p.GMV02f/2NP7vFvqVdG	deb@gmail.com	0
1	yor	$2y$10$OceehgEwzhvH4U1QRkPJjOaGIFHx7BmBRYSAcnCO08ft2gG3RV3ii	yor@gmail.com	0
3	DEIBYS	2	deasdsad	1
20	b	$2y$10$ZYQuKQ/dup3BbhD1lYisV.p741j6O6cEAdY6EH8mw.bGwQTQzT.f6	b@gmail.com	1
6	c	$2y$10$VrVpCNsJ4dX91vfo5fK.teLLvFXG0WgREkSBnU/CR10sm13.jVaBa	c@h	1
\.


--
-- Name: T_atleta_academico_id_aa_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"T_atleta_academico_id_aa_seq"', 18, true);


--
-- Name: T_atleta_cedula_atleta_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"T_atleta_cedula_atleta_seq"', 1, false);


--
-- Name: T_atleta_disciplina_id_ad_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"T_atleta_disciplina_id_ad_seq"', 92, true);


--
-- Name: T_atleta_ejecucion_pdc_id_aep_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"T_atleta_ejecucion_pdc_id_aep_seq"', 1, false);


--
-- Name: T_atleta_medico_id_am_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"T_atleta_medico_id_am_seq"', 14, true);


--
-- Name: T_atleta_prueba_id_ap_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"T_atleta_prueba_id_ap_seq"', 2, true);


--
-- Name: T_atleta_tiempo_pdc_id_atp_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"T_atleta_tiempo_pdc_id_atp_seq"', 71, true);


--
-- Name: T_atleta_uniforme_id_au_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"T_atleta_uniforme_id_au_seq"', 13, true);


--
-- Name: T_disciplina_id_disciplina_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"T_disciplina_id_disciplina_seq"', 53, true);


--
-- Name: T_equipo_tecnico_disciplina_id_etd_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"T_equipo_tecnico_disciplina_id_etd_seq"', 1, false);


--
-- Name: T_pdc_id_pdc_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"T_pdc_id_pdc_seq"', 18, true);


--
-- Name: T_pnf_id_pnf_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"T_pnf_id_pnf_seq"', 9, true);


--
-- Name: T_prueba_id_prueba_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"T_prueba_id_prueba_seq"', 2, true);


--
-- Name: rol_id_rol_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('rol_id_rol_seq', 1, false);


--
-- Name: roles_id_roles_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('roles_id_roles_seq', 5, true);


--
-- Name: usuarios_id_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('usuarios_id_usuario_seq', 6, true);


--
-- Name: T_atleta_academico T_atleta_academico_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_atleta_academico"
    ADD CONSTRAINT "T_atleta_academico_pkey" PRIMARY KEY (id_aa);


--
-- Name: T_atleta_disciplina T_atleta_disciplina_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_atleta_disciplina"
    ADD CONSTRAINT "T_atleta_disciplina_pkey" PRIMARY KEY (id_ad);


--
-- Name: T_atleta_ejecucion_pdc T_atleta_ejecucion_pdc_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_atleta_ejecucion_pdc"
    ADD CONSTRAINT "T_atleta_ejecucion_pdc_pkey" PRIMARY KEY (id_aep);


--
-- Name: T_atleta_medico T_atleta_medico_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_atleta_medico"
    ADD CONSTRAINT "T_atleta_medico_pkey" PRIMARY KEY (id_am);


--
-- Name: T_atleta T_atleta_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_atleta"
    ADD CONSTRAINT "T_atleta_pkey" PRIMARY KEY (cedula_atleta);


--
-- Name: T_atleta_prueba T_atleta_prueba_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_atleta_prueba"
    ADD CONSTRAINT "T_atleta_prueba_pkey" PRIMARY KEY (id_ap);


--
-- Name: T_dia_pdc T_atleta_tiempo_pdc_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_dia_pdc"
    ADD CONSTRAINT "T_atleta_tiempo_pdc_pkey" PRIMARY KEY (id_dp);


--
-- Name: T_atleta_uniforme T_atleta_uniforme_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_atleta_uniforme"
    ADD CONSTRAINT "T_atleta_uniforme_pkey" PRIMARY KEY (id_au);


--
-- Name: T_disciplina T_disciplina_nombre_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_disciplina"
    ADD CONSTRAINT "T_disciplina_nombre_key" UNIQUE (nombre);


--
-- Name: T_disciplina T_disciplina_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_disciplina"
    ADD CONSTRAINT "T_disciplina_pkey" PRIMARY KEY (id_disciplina);


--
-- Name: T_equipo_tecnico_disciplina T_equipo_tecnico_disciplina_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_equipo_tecnico_disciplina"
    ADD CONSTRAINT "T_equipo_tecnico_disciplina_pkey" PRIMARY KEY (id_etd);


--
-- Name: T_equipo_tecnico T_equipo_tecnico_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_equipo_tecnico"
    ADD CONSTRAINT "T_equipo_tecnico_pkey" PRIMARY KEY (cedula_et);


--
-- Name: T_pdc T_pdc_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_pdc"
    ADD CONSTRAINT "T_pdc_pkey" PRIMARY KEY (id_pdc);


--
-- Name: T_pnf T_pnf_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_pnf"
    ADD CONSTRAINT "T_pnf_pkey" PRIMARY KEY (id_pnf);


--
-- Name: T_prueba T_prueba_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_prueba"
    ADD CONSTRAINT "T_prueba_pkey" PRIMARY KEY (id_prueba);


--
-- Name: rol rol_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY rol
    ADD CONSTRAINT rol_pkey PRIMARY KEY (id_rol);


--
-- Name: roles roles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id_roles);


--
-- Name: usuarios usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id_usuario);


--
-- Name: roles FK_ID_ROL; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY roles
    ADD CONSTRAINT "FK_ID_ROL" FOREIGN KEY (id_rol) REFERENCES rol(id_rol) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: roles FK_ID_USER; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY roles
    ADD CONSTRAINT "FK_ID_USER" FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: T_atleta_academico T_atleta_academico_cedula_atleta_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_atleta_academico"
    ADD CONSTRAINT "T_atleta_academico_cedula_atleta_fkey" FOREIGN KEY (cedula_atleta) REFERENCES "T_atleta"(cedula_atleta) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: T_atleta_academico T_atleta_academico_id_pnf_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_atleta_academico"
    ADD CONSTRAINT "T_atleta_academico_id_pnf_fkey" FOREIGN KEY (id_pnf) REFERENCES "T_pnf"(id_pnf) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: T_atleta_disciplina T_atleta_disciplina_cedula_atleta_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_atleta_disciplina"
    ADD CONSTRAINT "T_atleta_disciplina_cedula_atleta_fkey" FOREIGN KEY (cedula_atleta) REFERENCES "T_atleta"(cedula_atleta) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: T_atleta_disciplina T_atleta_disciplina_id_disciplina_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_atleta_disciplina"
    ADD CONSTRAINT "T_atleta_disciplina_id_disciplina_fkey" FOREIGN KEY (id_disciplina) REFERENCES "T_disciplina"(id_disciplina) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: T_atleta_ejecucion_pdc T_atleta_ejecucion_pdc_cedula_atleta_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_atleta_ejecucion_pdc"
    ADD CONSTRAINT "T_atleta_ejecucion_pdc_cedula_atleta_fkey" FOREIGN KEY (cedula_atleta) REFERENCES "T_atleta"(cedula_atleta) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: T_atleta_ejecucion_pdc T_atleta_ejecucion_pdc_id_dp_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_atleta_ejecucion_pdc"
    ADD CONSTRAINT "T_atleta_ejecucion_pdc_id_dp_fkey" FOREIGN KEY (id_dp) REFERENCES "T_dia_pdc"(id_dp) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: T_atleta_medico T_atleta_medico_cedula_atleta_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_atleta_medico"
    ADD CONSTRAINT "T_atleta_medico_cedula_atleta_fkey" FOREIGN KEY (cedula_atleta) REFERENCES "T_atleta"(cedula_atleta) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: T_atleta_prueba T_atleta_prueba_cedula_atleta_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_atleta_prueba"
    ADD CONSTRAINT "T_atleta_prueba_cedula_atleta_fkey" FOREIGN KEY (cedula_atleta) REFERENCES "T_atleta"(cedula_atleta) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: T_atleta_prueba T_atleta_prueba_id_prueba_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_atleta_prueba"
    ADD CONSTRAINT "T_atleta_prueba_id_prueba_fkey" FOREIGN KEY (id_prueba) REFERENCES "T_prueba"(id_prueba) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: T_atleta_uniforme T_atleta_uniforme_cedula_atleta_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_atleta_uniforme"
    ADD CONSTRAINT "T_atleta_uniforme_cedula_atleta_fkey" FOREIGN KEY (cedula_atleta) REFERENCES "T_atleta"(cedula_atleta) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: T_dia_pdc T_dia_pdc_id_pdc_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_dia_pdc"
    ADD CONSTRAINT "T_dia_pdc_id_pdc_fkey" FOREIGN KEY (id_pdc) REFERENCES "T_pdc"(id_pdc) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: T_equipo_tecnico_disciplina T_equipo_tecnico_disciplina_cedula_et_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_equipo_tecnico_disciplina"
    ADD CONSTRAINT "T_equipo_tecnico_disciplina_cedula_et_fkey" FOREIGN KEY (cedula_et) REFERENCES "T_equipo_tecnico"(cedula_et) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: T_equipo_tecnico_disciplina T_equipo_tecnico_disciplina_id_disciplina_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_equipo_tecnico_disciplina"
    ADD CONSTRAINT "T_equipo_tecnico_disciplina_id_disciplina_fkey" FOREIGN KEY (id_disciplina) REFERENCES "T_disciplina"(id_disciplina) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: T_pdc T_pdc_id_disciplina_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_pdc"
    ADD CONSTRAINT "T_pdc_id_disciplina_fkey" FOREIGN KEY (id_disciplina) REFERENCES "T_disciplina"(id_disciplina) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

