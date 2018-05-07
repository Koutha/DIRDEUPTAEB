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
    id_prueba character varying
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
    status integer DEFAULT 1
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
    coordinador character varying(255) NOT NULL,
    status integer DEFAULT 1
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
-- Name: COLUMN "T_pnf".status; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_pnf".status IS 'estado del pnf 1 para visible 0 para oculto';


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
    id_prueba character varying NOT NULL,
    nombre character varying(255),
    descripcion character varying(255),
    tipo_prueba character varying(255),
    objetivo character varying(255),
    unidad character varying(255),
    rango1 integer,
    rango2 integer,
    rango3 integer,
    rango4 integer,
    status integer DEFAULT 1 NOT NULL,
    condicion integer
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
-- Name: COLUMN "T_prueba".condicion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_prueba".condicion IS 'determina la condicion para el calculo de la evaluacion de la prueba 0; valores menores. 1 ; para valores mayores';


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

INSERT INTO "T_atleta" VALUES ('2', 'Segundoa', 'DOS', '2018-03-01', 'casa', '2', '2', 'ddos@gmail.com', 'masculino', 'assets/img/img_foto_atleta/2VirtualBox_2018-03-06_20-28-29.png', 'assets/img/img_ced_atleta/2firefox_2018-03-24_12-03-48.png', 1);
INSERT INTO "T_atleta" VALUES ('20350027', 'Alvaro Sofi', 'Tirado Gil', '1992-04-20', 'Carrera 13 esq. Calle 18', '04164645556', '', 'alvarot027@gmail.com', 'masculino', 'assets/img/img_foto_atleta/203500272017-08-27-1310.jpg', 'assets/img/img_ced_atleta/20350027referencia compra de legion para homer de robert.jpg', 1);


--
-- Data for Name: T_atleta_academico; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "T_atleta_academico" VALUES (17, '3', '2010', 'assets/img/img_planilla_atleta/2firefox_2018-03-18_01-53-16.png', 'assets/img/img_carnet_atleta/2firefox_2018-03-18_01-53-16.png', '2', 2);
INSERT INTO "T_atleta_academico" VALUES (16, '3', '2015', 'assets/img/img_planilla_atleta/20350027VirtualBox_2018-03-06_20-28-29.png', 'assets/img/img_carnet_atleta/20350027firefox_2018-03-18_01-53-16.png', '20350027', 7);


--
-- Data for Name: T_atleta_disciplina; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "T_atleta_disciplina" VALUES (90, '2', 16);
INSERT INTO "T_atleta_disciplina" VALUES (91, '2', 18);
INSERT INTO "T_atleta_disciplina" VALUES (95, '20350027', 16);
INSERT INTO "T_atleta_disciplina" VALUES (96, '20350027', 18);


--
-- Data for Name: T_atleta_ejecucion_pdc; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: T_atleta_medico; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "T_atleta_medico" VALUES (13, 1.73000002, 60, '', 'd', '2', '', 'alergico a', '2', 'asd');
INSERT INTO "T_atleta_medico" VALUES (12, 1.72000003, 60, '', 'Maria gil', '02512370787', '', '', '20350027', '');


--
-- Data for Name: T_atleta_prueba; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "T_atleta_prueba" VALUES (3, '2018-05-16', '12', '20350027', 'EquLibtest');
INSERT INTO "T_atleta_prueba" VALUES (4, '2018-05-04', '15', '20350027', 'EquLibtest');
INSERT INTO "T_atleta_prueba" VALUES (5, '2018-05-04', '50', '20350027', 'EquLibtest');
INSERT INTO "T_atleta_prueba" VALUES (6, '2018-05-17', '50', '20350027', 'EquLibtest');
INSERT INTO "T_atleta_prueba" VALUES (7, '2018-05-17', '50', '20350027', 'EquLibtest');
INSERT INTO "T_atleta_prueba" VALUES (8, '2018-05-17', '50', '20350027', 'EquLibtest');
INSERT INTO "T_atleta_prueba" VALUES (9, '2018-05-17', '50', '20350027', 'EquLibtest');
INSERT INTO "T_atleta_prueba" VALUES (10, '2018-05-17', '50', '20350027', 'EquLibtest');
INSERT INTO "T_atleta_prueba" VALUES (11, '2018-05-17', '50', '20350027', 'EquLibtest');
INSERT INTO "T_atleta_prueba" VALUES (12, '2018-05-17', '50', '20350027', 'EquLibtest');
INSERT INTO "T_atleta_prueba" VALUES (13, '2018-05-17', '50', '20350027', 'EquLibtest');
INSERT INTO "T_atleta_prueba" VALUES (14, '2018-05-17', '50', '20350027', 'EquLibtest');
INSERT INTO "T_atleta_prueba" VALUES (15, '2018-05-30', '45', '20350027', 'EquLibtest');
INSERT INTO "T_atleta_prueba" VALUES (16, '2018-05-30', '45', '20350027', 'EquLibtest');
INSERT INTO "T_atleta_prueba" VALUES (17, '2018-05-30', '45', '20350027', 'EquLibtest');
INSERT INTO "T_atleta_prueba" VALUES (18, '2018-05-24', '40', '20350027', 'EquLibtest');
INSERT INTO "T_atleta_prueba" VALUES (19, '2018-05-24', '40', '20350027', 'EquLibtest');


--
-- Data for Name: T_atleta_uniforme; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "T_atleta_uniforme" VALUES (12, 'XS', 'XS', 'XS', '45', 'XL', 'XXL', '2');
INSERT INTO "T_atleta_uniforme" VALUES (11, 'S', 'M', 'S', '41', 'S', 'M', '20350027');


--
-- Data for Name: T_dia_pdc; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "T_dia_pdc" VALUES (432, '2018-05-28 01:28:00', NULL, NULL, NULL, NULL, 22, NULL);
INSERT INTO "T_dia_pdc" VALUES (433, '2018-05-29 06:00:00', NULL, NULL, NULL, NULL, 22, NULL);
INSERT INTO "T_dia_pdc" VALUES (434, '2018-05-30 06:00:00', NULL, NULL, NULL, NULL, 22, NULL);
INSERT INTO "T_dia_pdc" VALUES (435, '2018-05-31 06:00:00', NULL, NULL, NULL, NULL, 22, NULL);
INSERT INTO "T_dia_pdc" VALUES (436, '2018-06-01 06:00:00', NULL, NULL, NULL, NULL, 22, NULL);
INSERT INTO "T_dia_pdc" VALUES (437, '2018-06-02 06:00:00', NULL, NULL, NULL, NULL, 22, NULL);
INSERT INTO "T_dia_pdc" VALUES (438, '2018-06-03 06:00:00', NULL, NULL, NULL, NULL, 22, NULL);
INSERT INTO "T_dia_pdc" VALUES (439, '2018-06-04 06:00:00', NULL, NULL, NULL, NULL, 22, NULL);
INSERT INTO "T_dia_pdc" VALUES (440, '2018-06-05 06:00:00', NULL, NULL, NULL, NULL, 22, NULL);
INSERT INTO "T_dia_pdc" VALUES (441, '2018-06-06 06:00:00', NULL, NULL, NULL, NULL, 22, NULL);
INSERT INTO "T_dia_pdc" VALUES (442, '2018-06-07 06:00:00', NULL, NULL, NULL, NULL, 22, NULL);
INSERT INTO "T_dia_pdc" VALUES (443, '2018-06-08 06:00:00', NULL, NULL, NULL, NULL, 22, NULL);
INSERT INTO "T_dia_pdc" VALUES (444, '2018-06-09 06:00:00', NULL, NULL, NULL, NULL, 22, NULL);
INSERT INTO "T_dia_pdc" VALUES (445, '2018-06-10 06:00:00', NULL, NULL, NULL, NULL, 22, NULL);
INSERT INTO "T_dia_pdc" VALUES (446, '2018-06-11 06:00:00', NULL, NULL, NULL, NULL, 22, NULL);
INSERT INTO "T_dia_pdc" VALUES (447, '2018-06-12 06:00:00', NULL, NULL, NULL, NULL, 22, NULL);
INSERT INTO "T_dia_pdc" VALUES (448, '2018-06-13 06:00:00', NULL, NULL, NULL, NULL, 22, NULL);
INSERT INTO "T_dia_pdc" VALUES (449, '2018-06-14 06:00:00', NULL, NULL, NULL, NULL, 22, NULL);
INSERT INTO "T_dia_pdc" VALUES (450, '2018-06-15 06:00:00', NULL, NULL, NULL, NULL, 22, NULL);
INSERT INTO "T_dia_pdc" VALUES (451, '2018-06-16 06:00:00', NULL, NULL, NULL, NULL, 22, NULL);
INSERT INTO "T_dia_pdc" VALUES (452, '2018-06-17 06:00:00', NULL, NULL, NULL, NULL, 22, NULL);
INSERT INTO "T_dia_pdc" VALUES (453, '2018-06-18 06:00:00', NULL, NULL, NULL, NULL, 22, NULL);
INSERT INTO "T_dia_pdc" VALUES (454, '2018-06-19 06:00:00', NULL, NULL, NULL, NULL, 22, NULL);
INSERT INTO "T_dia_pdc" VALUES (455, '2018-06-20 06:00:00', NULL, NULL, NULL, NULL, 22, NULL);
INSERT INTO "T_dia_pdc" VALUES (456, '2018-06-21 06:00:00', NULL, NULL, NULL, NULL, 22, NULL);
INSERT INTO "T_dia_pdc" VALUES (457, '2018-06-22 06:00:00', NULL, NULL, NULL, NULL, 22, NULL);
INSERT INTO "T_dia_pdc" VALUES (458, '2018-06-23 06:00:00', NULL, NULL, NULL, NULL, 22, NULL);
INSERT INTO "T_dia_pdc" VALUES (459, '2018-06-24 06:00:00', NULL, NULL, NULL, NULL, 22, NULL);
INSERT INTO "T_dia_pdc" VALUES (460, '2018-06-25 06:00:00', NULL, NULL, NULL, NULL, 22, NULL);
INSERT INTO "T_dia_pdc" VALUES (461, '2018-06-26 06:00:00', NULL, NULL, NULL, NULL, 22, NULL);
INSERT INTO "T_dia_pdc" VALUES (259, '2018-04-16 17:39:00', NULL, NULL, NULL, NULL, 17, NULL);
INSERT INTO "T_dia_pdc" VALUES (260, '2018-04-17 06:00:00', NULL, NULL, NULL, NULL, 17, NULL);
INSERT INTO "T_dia_pdc" VALUES (261, '2018-04-18 06:00:00', NULL, NULL, NULL, NULL, 17, NULL);
INSERT INTO "T_dia_pdc" VALUES (262, '2018-04-19 06:00:00', NULL, NULL, NULL, NULL, 17, NULL);
INSERT INTO "T_dia_pdc" VALUES (263, '2018-04-20 06:00:00', NULL, NULL, NULL, NULL, 17, NULL);
INSERT INTO "T_dia_pdc" VALUES (264, '2018-04-21 06:00:00', NULL, NULL, NULL, NULL, 17, NULL);
INSERT INTO "T_dia_pdc" VALUES (265, '2018-04-22 06:00:00', NULL, NULL, NULL, NULL, 17, NULL);
INSERT INTO "T_dia_pdc" VALUES (266, '2018-04-23 06:00:00', NULL, NULL, NULL, NULL, 17, NULL);
INSERT INTO "T_dia_pdc" VALUES (267, '2018-04-24 06:00:00', NULL, NULL, NULL, NULL, 17, NULL);
INSERT INTO "T_dia_pdc" VALUES (268, '2018-04-25 06:00:00', NULL, NULL, NULL, NULL, 17, NULL);
INSERT INTO "T_dia_pdc" VALUES (269, '2018-04-26 06:00:00', NULL, NULL, NULL, NULL, 17, NULL);
INSERT INTO "T_dia_pdc" VALUES (270, '2018-04-27 06:00:00', NULL, NULL, NULL, NULL, 17, NULL);
INSERT INTO "T_dia_pdc" VALUES (271, '2018-04-28 06:00:00', NULL, NULL, NULL, NULL, 17, NULL);
INSERT INTO "T_dia_pdc" VALUES (272, '2018-04-29 06:00:00', NULL, NULL, NULL, NULL, 17, NULL);
INSERT INTO "T_dia_pdc" VALUES (273, '2018-04-30 06:00:00', NULL, NULL, NULL, NULL, 17, NULL);
INSERT INTO "T_dia_pdc" VALUES (274, '2018-05-01 06:00:00', NULL, NULL, NULL, NULL, 17, NULL);
INSERT INTO "T_dia_pdc" VALUES (462, '2018-06-27 06:00:00', NULL, NULL, NULL, NULL, 22, NULL);
INSERT INTO "T_dia_pdc" VALUES (463, '2018-06-28 06:00:00', NULL, NULL, NULL, NULL, 22, NULL);
INSERT INTO "T_dia_pdc" VALUES (275, '2018-05-02 06:00:00', NULL, NULL, NULL, NULL, 17, NULL);
INSERT INTO "T_dia_pdc" VALUES (276, '2018-05-03 06:00:00', NULL, NULL, NULL, NULL, 17, NULL);
INSERT INTO "T_dia_pdc" VALUES (277, '2018-05-04 06:00:00', NULL, NULL, NULL, NULL, 17, NULL);
INSERT INTO "T_dia_pdc" VALUES (278, '2018-05-05 06:00:00', NULL, NULL, NULL, NULL, 17, NULL);
INSERT INTO "T_dia_pdc" VALUES (279, '2018-05-06 06:00:00', NULL, NULL, NULL, NULL, 17, NULL);
INSERT INTO "T_dia_pdc" VALUES (280, '2018-05-07 06:00:00', NULL, NULL, NULL, NULL, 17, NULL);
INSERT INTO "T_dia_pdc" VALUES (281, '2018-04-02 00:00:00', NULL, NULL, NULL, NULL, 18, NULL);
INSERT INTO "T_dia_pdc" VALUES (282, '2018-04-03 06:00:00', NULL, NULL, NULL, NULL, 18, NULL);
INSERT INTO "T_dia_pdc" VALUES (283, '2018-04-04 06:00:00', NULL, NULL, NULL, NULL, 18, NULL);
INSERT INTO "T_dia_pdc" VALUES (284, '2018-04-05 06:00:00', NULL, NULL, NULL, NULL, 18, NULL);
INSERT INTO "T_dia_pdc" VALUES (285, '2018-04-06 06:00:00', NULL, NULL, NULL, NULL, 18, NULL);
INSERT INTO "T_dia_pdc" VALUES (286, '2018-04-07 06:00:00', NULL, NULL, NULL, NULL, 18, NULL);
INSERT INTO "T_dia_pdc" VALUES (287, '2018-04-08 06:00:00', NULL, NULL, NULL, NULL, 18, NULL);
INSERT INTO "T_dia_pdc" VALUES (288, '2018-04-09 06:00:00', NULL, NULL, NULL, NULL, 18, NULL);
INSERT INTO "T_dia_pdc" VALUES (289, '2018-04-10 06:00:00', NULL, NULL, NULL, NULL, 18, NULL);
INSERT INTO "T_dia_pdc" VALUES (290, '2018-04-11 06:00:00', NULL, NULL, NULL, NULL, 18, NULL);
INSERT INTO "T_dia_pdc" VALUES (291, '2018-04-12 06:00:00', NULL, NULL, NULL, NULL, 18, NULL);
INSERT INTO "T_dia_pdc" VALUES (292, '2018-04-13 06:00:00', NULL, NULL, NULL, NULL, 18, NULL);
INSERT INTO "T_dia_pdc" VALUES (293, '2018-04-14 06:00:00', NULL, NULL, NULL, NULL, 18, NULL);
INSERT INTO "T_dia_pdc" VALUES (294, '2018-04-15 06:00:00', NULL, NULL, NULL, NULL, 18, NULL);
INSERT INTO "T_dia_pdc" VALUES (295, '2018-04-16 06:00:00', NULL, NULL, NULL, NULL, 18, NULL);
INSERT INTO "T_dia_pdc" VALUES (296, '2018-04-17 06:00:00', NULL, NULL, NULL, NULL, 18, NULL);
INSERT INTO "T_dia_pdc" VALUES (297, '2018-04-18 06:00:00', NULL, NULL, NULL, NULL, 18, NULL);
INSERT INTO "T_dia_pdc" VALUES (298, '2018-04-19 06:00:00', NULL, NULL, NULL, NULL, 18, NULL);
INSERT INTO "T_dia_pdc" VALUES (299, '2018-04-20 06:00:00', NULL, NULL, NULL, NULL, 18, NULL);
INSERT INTO "T_dia_pdc" VALUES (300, '2018-04-21 06:00:00', NULL, NULL, NULL, NULL, 18, NULL);
INSERT INTO "T_dia_pdc" VALUES (301, '2018-04-22 06:00:00', NULL, NULL, NULL, NULL, 18, NULL);
INSERT INTO "T_dia_pdc" VALUES (302, '2018-12-03 23:35:00', NULL, NULL, NULL, NULL, 19, NULL);
INSERT INTO "T_dia_pdc" VALUES (303, '2018-12-04 06:00:00', NULL, NULL, NULL, NULL, 19, NULL);
INSERT INTO "T_dia_pdc" VALUES (304, '2018-12-05 06:00:00', NULL, NULL, NULL, NULL, 19, NULL);
INSERT INTO "T_dia_pdc" VALUES (305, '2018-12-06 06:00:00', NULL, NULL, NULL, NULL, 19, NULL);
INSERT INTO "T_dia_pdc" VALUES (306, '2018-12-07 06:00:00', NULL, NULL, NULL, NULL, 19, NULL);
INSERT INTO "T_dia_pdc" VALUES (307, '2018-12-08 06:00:00', NULL, NULL, NULL, NULL, 19, NULL);
INSERT INTO "T_dia_pdc" VALUES (308, '2018-12-09 06:00:00', NULL, NULL, NULL, NULL, 19, NULL);
INSERT INTO "T_dia_pdc" VALUES (309, '2018-12-10 06:00:00', NULL, NULL, NULL, NULL, 19, NULL);
INSERT INTO "T_dia_pdc" VALUES (310, '2018-12-11 06:00:00', NULL, NULL, NULL, NULL, 19, NULL);
INSERT INTO "T_dia_pdc" VALUES (311, '2018-12-12 06:00:00', NULL, NULL, NULL, NULL, 19, NULL);
INSERT INTO "T_dia_pdc" VALUES (312, '2018-12-13 06:00:00', NULL, NULL, NULL, NULL, 19, NULL);
INSERT INTO "T_dia_pdc" VALUES (313, '2018-12-14 06:00:00', NULL, NULL, NULL, NULL, 19, NULL);
INSERT INTO "T_dia_pdc" VALUES (314, '2018-12-15 06:00:00', NULL, NULL, NULL, NULL, 19, NULL);
INSERT INTO "T_dia_pdc" VALUES (315, '2018-12-16 06:00:00', NULL, NULL, NULL, NULL, 19, NULL);
INSERT INTO "T_dia_pdc" VALUES (316, '2018-12-17 06:00:00', NULL, NULL, NULL, NULL, 19, NULL);
INSERT INTO "T_dia_pdc" VALUES (317, '2018-12-18 06:00:00', NULL, NULL, NULL, NULL, 19, NULL);
INSERT INTO "T_dia_pdc" VALUES (318, '2018-12-19 06:00:00', NULL, NULL, NULL, NULL, 19, NULL);
INSERT INTO "T_dia_pdc" VALUES (319, '2018-12-20 06:00:00', NULL, NULL, NULL, NULL, 19, NULL);
INSERT INTO "T_dia_pdc" VALUES (320, '2018-12-21 06:00:00', NULL, NULL, NULL, NULL, 19, NULL);
INSERT INTO "T_dia_pdc" VALUES (321, '2018-12-22 06:00:00', NULL, NULL, NULL, NULL, 19, NULL);
INSERT INTO "T_dia_pdc" VALUES (322, '2018-12-23 06:00:00', NULL, NULL, NULL, NULL, 19, NULL);
INSERT INTO "T_dia_pdc" VALUES (323, '2018-12-24 06:00:00', NULL, NULL, NULL, NULL, 19, NULL);
INSERT INTO "T_dia_pdc" VALUES (324, '2018-11-05 23:40:00', NULL, NULL, NULL, NULL, 20, NULL);
INSERT INTO "T_dia_pdc" VALUES (325, '2018-11-06 06:00:00', NULL, NULL, NULL, NULL, 20, NULL);
INSERT INTO "T_dia_pdc" VALUES (326, '2018-11-07 06:00:00', NULL, NULL, NULL, NULL, 20, NULL);
INSERT INTO "T_dia_pdc" VALUES (327, '2018-11-08 06:00:00', NULL, NULL, NULL, NULL, 20, NULL);
INSERT INTO "T_dia_pdc" VALUES (328, '2018-11-09 06:00:00', NULL, NULL, NULL, NULL, 20, NULL);
INSERT INTO "T_dia_pdc" VALUES (329, '2018-11-10 06:00:00', NULL, NULL, NULL, NULL, 20, NULL);
INSERT INTO "T_dia_pdc" VALUES (330, '2018-11-11 06:00:00', NULL, NULL, NULL, NULL, 20, NULL);
INSERT INTO "T_dia_pdc" VALUES (331, '2018-11-12 06:00:00', NULL, NULL, NULL, NULL, 20, NULL);
INSERT INTO "T_dia_pdc" VALUES (332, '2018-11-13 06:00:00', NULL, NULL, NULL, NULL, 20, NULL);
INSERT INTO "T_dia_pdc" VALUES (333, '2018-11-14 06:00:00', NULL, NULL, NULL, NULL, 20, NULL);
INSERT INTO "T_dia_pdc" VALUES (334, '2018-11-15 06:00:00', NULL, NULL, NULL, NULL, 20, NULL);
INSERT INTO "T_dia_pdc" VALUES (335, '2018-11-16 06:00:00', NULL, NULL, NULL, NULL, 20, NULL);
INSERT INTO "T_dia_pdc" VALUES (336, '2018-11-17 06:00:00', NULL, NULL, NULL, NULL, 20, NULL);
INSERT INTO "T_dia_pdc" VALUES (337, '2018-11-18 06:00:00', NULL, NULL, NULL, NULL, 20, NULL);
INSERT INTO "T_dia_pdc" VALUES (338, '2018-11-19 06:00:00', NULL, NULL, NULL, NULL, 20, NULL);
INSERT INTO "T_dia_pdc" VALUES (339, '2018-11-20 06:00:00', NULL, NULL, NULL, NULL, 20, NULL);
INSERT INTO "T_dia_pdc" VALUES (340, '2018-11-21 06:00:00', NULL, NULL, NULL, NULL, 20, NULL);
INSERT INTO "T_dia_pdc" VALUES (341, '2018-11-22 06:00:00', NULL, NULL, NULL, NULL, 20, NULL);
INSERT INTO "T_dia_pdc" VALUES (342, '2018-11-23 06:00:00', NULL, NULL, NULL, NULL, 20, NULL);
INSERT INTO "T_dia_pdc" VALUES (343, '2018-11-24 06:00:00', NULL, NULL, NULL, NULL, 20, NULL);
INSERT INTO "T_dia_pdc" VALUES (344, '2018-11-25 06:00:00', NULL, NULL, NULL, NULL, 20, NULL);
INSERT INTO "T_dia_pdc" VALUES (345, '2018-11-26 06:00:00', NULL, NULL, NULL, NULL, 20, NULL);
INSERT INTO "T_dia_pdc" VALUES (346, '2018-07-02 06:00:00', NULL, NULL, NULL, NULL, 21, NULL);
INSERT INTO "T_dia_pdc" VALUES (347, '2018-07-03 06:00:00', NULL, NULL, NULL, NULL, 21, NULL);
INSERT INTO "T_dia_pdc" VALUES (348, '2018-07-04 06:00:00', NULL, NULL, NULL, NULL, 21, NULL);
INSERT INTO "T_dia_pdc" VALUES (349, '2018-07-05 06:00:00', NULL, NULL, NULL, NULL, 21, NULL);
INSERT INTO "T_dia_pdc" VALUES (350, '2018-07-06 06:00:00', NULL, NULL, NULL, NULL, 21, NULL);
INSERT INTO "T_dia_pdc" VALUES (351, '2018-07-07 06:00:00', NULL, NULL, NULL, NULL, 21, NULL);
INSERT INTO "T_dia_pdc" VALUES (352, '2018-07-08 06:00:00', NULL, NULL, NULL, NULL, 21, NULL);
INSERT INTO "T_dia_pdc" VALUES (353, '2018-07-09 06:00:00', NULL, NULL, NULL, NULL, 21, NULL);
INSERT INTO "T_dia_pdc" VALUES (354, '2018-07-10 06:00:00', NULL, NULL, NULL, NULL, 21, NULL);
INSERT INTO "T_dia_pdc" VALUES (355, '2018-07-11 06:00:00', NULL, NULL, NULL, NULL, 21, NULL);
INSERT INTO "T_dia_pdc" VALUES (356, '2018-07-12 06:00:00', NULL, NULL, NULL, NULL, 21, NULL);
INSERT INTO "T_dia_pdc" VALUES (357, '2018-07-13 06:00:00', NULL, NULL, NULL, NULL, 21, NULL);
INSERT INTO "T_dia_pdc" VALUES (358, '2018-07-14 06:00:00', NULL, NULL, NULL, NULL, 21, NULL);
INSERT INTO "T_dia_pdc" VALUES (359, '2018-07-15 06:00:00', NULL, NULL, NULL, NULL, 21, NULL);
INSERT INTO "T_dia_pdc" VALUES (360, '2018-07-16 06:00:00', NULL, NULL, NULL, NULL, 21, NULL);
INSERT INTO "T_dia_pdc" VALUES (361, '2018-07-17 06:00:00', NULL, NULL, NULL, NULL, 21, NULL);
INSERT INTO "T_dia_pdc" VALUES (362, '2018-07-18 06:00:00', NULL, NULL, NULL, NULL, 21, NULL);
INSERT INTO "T_dia_pdc" VALUES (363, '2018-07-19 06:00:00', NULL, NULL, NULL, NULL, 21, NULL);
INSERT INTO "T_dia_pdc" VALUES (364, '2018-07-20 06:00:00', NULL, NULL, NULL, NULL, 21, NULL);
INSERT INTO "T_dia_pdc" VALUES (365, '2018-07-21 06:00:00', NULL, NULL, NULL, NULL, 21, NULL);
INSERT INTO "T_dia_pdc" VALUES (366, '2018-07-22 06:00:00', NULL, NULL, NULL, NULL, 21, NULL);
INSERT INTO "T_dia_pdc" VALUES (367, '2018-07-23 06:00:00', NULL, NULL, NULL, NULL, 21, NULL);


--
-- Data for Name: T_disciplina; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "T_disciplina" VALUES (16, 'Ajedrez Masculino', 'Mesa', 1);
INSERT INTO "T_disciplina" VALUES (17, 'Ajedrez Femenino', 'Mesa', 1);
INSERT INTO "T_disciplina" VALUES (18, 'Atletismo Masculino', 'Registro y Marca', 1);
INSERT INTO "T_disciplina" VALUES (19, 'Atletismo Femenino', 'Registro y Marca', 1);
INSERT INTO "T_disciplina" VALUES (23, 'Ciclismo Masculino', 'Registro y Marca', 1);
INSERT INTO "T_disciplina" VALUES (24, 'Ciclismo Femenino', 'Registro y Marca', 1);
INSERT INTO "T_disciplina" VALUES (25, 'Esgrima Masculino', 'Combate', 1);
INSERT INTO "T_disciplina" VALUES (26, 'Esgrima Femenino', 'Combate', 1);
INSERT INTO "T_disciplina" VALUES (31, 'Judo Masculino', 'Combate', 1);
INSERT INTO "T_disciplina" VALUES (32, 'Judo Femenino', 'Combate', 1);
INSERT INTO "T_disciplina" VALUES (33, 'Karate Do Masculino', 'Combate', 1);
INSERT INTO "T_disciplina" VALUES (34, 'Karate Do Femenino', 'Combate', 1);
INSERT INTO "T_disciplina" VALUES (36, 'Levantamiento de Pesas Masculino', 'Registro y Marca', 1);
INSERT INTO "T_disciplina" VALUES (37, 'Levantamiento de Pesas Femenino', 'Registro y Marca', 1);
INSERT INTO "T_disciplina" VALUES (38, 'Lucha Olimpica Masculino', 'Combate', 1);
INSERT INTO "T_disciplina" VALUES (39, 'Lucha Olimpica Femenino', 'Combate', 1);
INSERT INTO "T_disciplina" VALUES (40, 'Natación Masculino', 'Registro y Marca', 1);
INSERT INTO "T_disciplina" VALUES (41, 'Natación Femenino', 'Registro y Marca', 1);
INSERT INTO "T_disciplina" VALUES (44, 'Taekwondo Masculino', 'Combate', 1);
INSERT INTO "T_disciplina" VALUES (45, 'Taekwondo Femenino', 'Combate', 1);
INSERT INTO "T_disciplina" VALUES (48, 'Tenis de Mesa Masculino', 'Mesa', 1);
INSERT INTO "T_disciplina" VALUES (49, 'Tenis de Mesa Femenino', 'Mesa', 1);
INSERT INTO "T_disciplina" VALUES (50, 'Voleibol de Arena Masculino', 'Pelota', 1);
INSERT INTO "T_disciplina" VALUES (51, 'Voleibol Arena Femenino', 'Pelota', 1);
INSERT INTO "T_disciplina" VALUES (52, 'Voleibol Masculino', 'Pelota', 1);
INSERT INTO "T_disciplina" VALUES (53, 'Voleibol Femenino', 'Pelota', 1);
INSERT INTO "T_disciplina" VALUES (20, 'Baloncesto Masculino', 'Pelota', 1);
INSERT INTO "T_disciplina" VALUES (21, 'Baloncesto Femenino', 'Pelota', 1);
INSERT INTO "T_disciplina" VALUES (22, 'Béisbol', 'Pelota', 1);
INSERT INTO "T_disciplina" VALUES (27, 'Fútbol Masculino', 'Pelota', 1);
INSERT INTO "T_disciplina" VALUES (28, 'Fútbol Femenino', 'Pelota', 1);
INSERT INTO "T_disciplina" VALUES (29, 'Fútbol Sala Masculino', 'Pelota', 1);
INSERT INTO "T_disciplina" VALUES (30, 'Fútbol Sala Femenino', 'Pelota', 1);
INSERT INTO "T_disciplina" VALUES (35, 'Kickingball', 'Pelota', 1);
INSERT INTO "T_disciplina" VALUES (42, 'Sóftbol Masculino', 'Pelota', 1);
INSERT INTO "T_disciplina" VALUES (43, 'Sóftbol Femenino', 'Pelota', 1);
INSERT INTO "T_disciplina" VALUES (46, 'Tenis Masculino', 'Pelota', 1);
INSERT INTO "T_disciplina" VALUES (47, 'Tenis Femenino', 'Pelota', 1);


--
-- Data for Name: T_equipo_tecnico; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "T_equipo_tecnico" VALUES ('19263736', 'Osmin Elieser', 'Principal Gonzalez', 'entrenador', '55555555555', 'ada@gmail.com', 'assets/img/img_foto_personal/19263736casos de uso del sistema.png', 'assets/img/img_ced_personal/19263736casos de uso del sistema.png', 1);


--
-- Data for Name: T_equipo_tecnico_disciplina; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "T_equipo_tecnico_disciplina" VALUES (9, '19263736', 19);
INSERT INTO "T_equipo_tecnico_disciplina" VALUES (10, '19263736', 23);


--
-- Data for Name: T_pdc; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "T_pdc" VALUES (17, '2018-04-16 17:39:00', '2018-05-07 17:40:00', 20, 20, 20, 20, 20, 16, 'Preparatorio', 'evento 1', 'aqui desc');
INSERT INTO "T_pdc" VALUES (18, '2018-04-02 00:00:00', '2018-04-23 00:01:00', 20, 20, 20, 20, 20, 18, 'Pre-Compentencia', 'evento modificado 2', 'prueba de registro modificado 1');
INSERT INTO "T_pdc" VALUES (19, '2018-12-03 23:35:00', '2018-12-24 23:36:00', 20, 20, 20, 20, 20, 40, 'Pre-Compentencia', 'Planificacion', 'adasdsadsad');
INSERT INTO "T_pdc" VALUES (20, '2018-11-05 23:40:00', '2018-11-26 23:41:00', 20, 20, 20, 20, 20, 39, 'Preparatorio', 'Planificacion 1', 'asdad');
INSERT INTO "T_pdc" VALUES (21, '2018-07-02 06:00:00', '2018-07-23 22:00:00', 20, 20, 20, 20, 20, 40, 'Preparatorio', 'evento 5', 'adsads');
INSERT INTO "T_pdc" VALUES (22, '2018-05-28 01:28:00', '2018-06-29 01:29:00', 20, 20, 20, 20, 20, 18, 'Preparatorio', 'evento de carlangas 12345', 'aqui ya son las 1 y media de la mañana programando');


--
-- Data for Name: T_pnf; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "T_pnf" VALUES (3, 'PNF en Contaduría Publica', 'coordinador', 1);
INSERT INTO "T_pnf" VALUES (4, 'PNF en Turismo', 'coordinador', 1);
INSERT INTO "T_pnf" VALUES (5, 'PNF en Agroalimentación', 'coordinador', 1);
INSERT INTO "T_pnf" VALUES (6, 'PNF en Higiene y seguridad laboral', 'coordinador', 1);
INSERT INTO "T_pnf" VALUES (7, 'PNF en Informática', 'Jehamar Lovera', 1);
INSERT INTO "T_pnf" VALUES (8, 'PNF en Sistemas de calidad y ambiente', 'coordinador', 1);
INSERT INTO "T_pnf" VALUES (1, 'PNF en Deportes', 'coordinador', 1);
INSERT INTO "T_pnf" VALUES (2, 'PNF en Ciencias  de la Información', 'coordinador', 1);
INSERT INTO "T_pnf" VALUES (9, 'PNF en Administracion', 'coordinador', 1);
INSERT INTO "T_pnf" VALUES (10, 'prueba', 'qwertyuio', 1);


--
-- Data for Name: T_prueba; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "T_prueba" VALUES ('EquLibtest', 'test', '
vjklm', 'Equilibrio', 'gujyhuji', 'Libras', 30, 60, 90, 120, 1, 1);


--
-- Data for Name: rol; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO rol VALUES (1, 'Administrador');
INSERT INTO rol VALUES (2, 'Usuario');


--
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO roles VALUES (3, 1, 4);
INSERT INTO roles VALUES (12, 1, 13);
INSERT INTO roles VALUES (20, 2, 21);
INSERT INTO roles VALUES (24, 1, 25);
INSERT INTO roles VALUES (1, 2, 1);
INSERT INTO roles VALUES (2, 1, 2);
INSERT INTO roles VALUES (13, 1, 14);
INSERT INTO roles VALUES (19, 2, 20);
INSERT INTO roles VALUES (5, 2, 6);


--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO usuarios VALUES (4, 'Osmin', '$2y$10$uaPjldZeqaQntNfKPc4ZA.dptrK7t7FpA8MrHLBX/sIfGN/EK55c.', 'osminprincipal@gmail.com', 1);
INSERT INTO usuarios VALUES (13, 'a', '$2y$10$LYOx5fevRGcdrCjuYIVgsu1px4UK9Af2Hg35ZByiBB3Qvw8vvEJwW', 'a@g.com', 1);
INSERT INTO usuarios VALUES (21, 'Wister', '$2y$10$pIil43i0vJDJsrCgcB3JkObgC1iOWjh5jO1H5V/R7xoIPkPTineri', 'wister@gmail.com', 1);
INSERT INTO usuarios VALUES (25, 'prueba', '$2y$10$toKI4Jc4pqtgPLI4XBCbA.t24qDhvYf6EtStUPbDc.TrSUppjDwVO', 'prueba@gmail.com', 1);
INSERT INTO usuarios VALUES (2, 'deb', '$2y$10$rRGEu8ut0Sm6vGPLuDa04eQB6wgXO.D67p.GMV02f/2NP7vFvqVdG', 'deb@gmail.com', 0);
INSERT INTO usuarios VALUES (1, 'yor', '$2y$10$OceehgEwzhvH4U1QRkPJjOaGIFHx7BmBRYSAcnCO08ft2gG3RV3ii', 'yor@gmail.com', 0);
INSERT INTO usuarios VALUES (14, 'wifi', '$2y$10$Usu/CkfZ0alsl2VOdJx7iOcWNjPd1NiTKuTGbZoNH1ZRKbm2Tes0i', 'asdsad@hotmail.com', 1);
INSERT INTO usuarios VALUES (20, 'b', '$2y$10$tyCuyX09T8LDvQqn7CIB2.vCpCE5mTfuJEJIis5bNSMlDtMgkoA8.', 'b@gmail.com', 1);
INSERT INTO usuarios VALUES (6, 'c', '$2y$10$P4bs6940273L7MRBaL/cRuz38XwK2TbgNgKnDV2dh4XgUT6Be4M.K', 'c@h', 1);


--
-- Name: T_atleta_academico_id_aa_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"T_atleta_academico_id_aa_seq"', 20, true);


--
-- Name: T_atleta_cedula_atleta_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"T_atleta_cedula_atleta_seq"', 1, false);


--
-- Name: T_atleta_disciplina_id_ad_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"T_atleta_disciplina_id_ad_seq"', 96, true);


--
-- Name: T_atleta_ejecucion_pdc_id_aep_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"T_atleta_ejecucion_pdc_id_aep_seq"', 1, false);


--
-- Name: T_atleta_medico_id_am_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"T_atleta_medico_id_am_seq"', 16, true);


--
-- Name: T_atleta_prueba_id_ap_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"T_atleta_prueba_id_ap_seq"', 19, true);


--
-- Name: T_atleta_tiempo_pdc_id_atp_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"T_atleta_tiempo_pdc_id_atp_seq"', 463, true);


--
-- Name: T_atleta_uniforme_id_au_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"T_atleta_uniforme_id_au_seq"', 15, true);


--
-- Name: T_disciplina_id_disciplina_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"T_disciplina_id_disciplina_seq"', 54, true);


--
-- Name: T_equipo_tecnico_disciplina_id_etd_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"T_equipo_tecnico_disciplina_id_etd_seq"', 12, true);


--
-- Name: T_pdc_id_pdc_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"T_pdc_id_pdc_seq"', 22, true);


--
-- Name: T_pnf_id_pnf_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"T_pnf_id_pnf_seq"', 11, true);


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

SELECT pg_catalog.setval('roles_id_roles_seq', 6, true);


--
-- Name: usuarios_id_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('usuarios_id_usuario_seq', 7, true);


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

