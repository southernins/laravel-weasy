<?php
namespace  SouthernIns\LaravelWeasy\Facades;

use Illuminate\Support\Facades\Facade as BaseFacade;
use SouthernIns\LaravelWeasy\PdfFaker;


/**
 * @method static \SouthernIns\LaravelWeasy\PdfWrapper setPaper($paper, $orientation = 'portrait')
 * @method static \SouthernIns\LaravelWeasy\PdfWrapper setWarnings($warnings)
 * @method static \SouthernIns\LaravelWeasy\PdfWrapper setOptions(array $options)
 * @method static \SouthernIns\LaravelWeasy\PdfWrapper loadView($view, $data = array(), $mergeData = array(), $encoding = null)
 * @method static \SouthernIns\LaravelWeasy\PdfWrapper loadHTML($string, $encoding = null)
 * @method static \SouthernIns\LaravelWeasy\PdfWrapper loadFile($file)
 * @method static string output($options = [])
 * @method static \SouthernIns\LaravelWeasy\PdfWrapper save()
 * @method static \Illuminate\Http\Response download($filename = 'document.pdf')
 * @method static \Illuminate\Http\Response inline($filename = 'document.pdf')
 *
 */
class WeasyPdf extends BaseFacade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'weasy.pdf.wrapper'; }

    /**
     * Replace the bound instance with a fake.
     *
     * @return void
     */
    public static function fake()
    {
        static::swap(new PdfFaker(app('weasy.pdf')));
    }

}
