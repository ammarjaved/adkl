<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapController extends Controller
{
    //
    public function show($id)
    {
        $data = DB::select("SELECT json_build_object(
            'type', 'FeatureCollection',
            'crs', json_build_object(
                'type', 'name',
                'properties', json_build_object('name', 'EPSG:4326')
            ),
            'features', json_agg(json_build_object(
                'type', 'Feature',
                'id', id,
                'geometry', ST_AsGeoJSON(geom)::json,
                'properties', json_build_object(
                    'id',id,
                    'sn', sn,
                    'date', date,
                    'po_no',po_no
                )
            ))) AS geojson
        FROM (
            SELECT id, geom, sn, date::date, po_no
            FROM service_no_details
            WHERE id = '$id'
        ) AS tbl1;
         ");
            return $data[0]->geojson;

        return $data[0]->geojson;
    }



    public function showByVendor($id)
    {
        $data = DB::select("SELECT json_build_object(
            'type', 'FeatureCollection',
            'crs', json_build_object(
                'type', 'name',
                'properties', json_build_object('name', 'EPSG:4326')
            ),
            'features', json_agg(json_build_object(
                'type', 'Feature',
                'id', id,
                'geometry', ST_AsGeoJSON(geom)::json,
                'properties', json_build_object(
                    'id',id,
                    'sn', sn,
                    'date', date,
                    'po_no',po_no
                )
            ))) AS geojson
        FROM (
            SELECT id, geom, sn, date::date, po_no
            FROM service_no_details
            WHERE created_by = '$id'
        ) AS tbl1;
         ");
            return $data[0]->geojson;
    }

    public function index()
    {
        $data = DB::select("SELECT json_build_object(
            'type', 'FeatureCollection',
            'crs', json_build_object(
                'type', 'name',
                'properties', json_build_object('name', 'EPSG:4326')
            ),
            'features', json_agg(json_build_object(
                'type', 'Feature',
                'id', id,
                'geometry', ST_AsGeoJSON(geom)::json,
                'properties', json_build_object(
                    'id',id,
                    'sn', sn,
                    'date', date,
                    'po_no',po_no
                )
            ))) AS geojson
        FROM (
            SELECT id, geom, sn, date::date, po_no
            FROM service_no_details
        ) AS tbl1;
         ");
            return $data[0]->geojson;

    }


    public function getMapByPo($id)
    {
        $data = DB::select("SELECT json_build_object(
            'type', 'FeatureCollection',
            'crs', json_build_object(
                'type', 'name',
                'properties', json_build_object('name', 'EPSG:4326')
            ),
            'features', json_agg(json_build_object(
                'type', 'Feature',
                'id', id,
                'geometry', ST_AsGeoJSON(geom)::json,
                'properties', json_build_object(
                    'id',id,
                    'sn', sn,
                    'date', date,
                    'po_no',po_no
                )
            ))) AS geojson
        FROM (
            SELECT id, geom, sn, date::date, po_no
            FROM service_no_details
            WHERE po_no = '$id'
        ) AS tbl1;
         ");
            return $data[0]->geojson;
    }
}
