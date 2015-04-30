#!/usr/bin/python

import subprocess
import os

phpport = 9490
hhvmport = 9491
_iterationsNum = 20

def runTest (engine, testSuiteDir, testSuiteName, iterationsNum=_iterationsNum, printAllIterations=False):
    port = -1

    #!! Be careful, I restart server to clear all cache
    if engine == "PHP":
        port = phpport
        #os.system ("sudo service php-fpm restart");
    elif engine == "HHVM":
        port = hhvmport
        #os.system ("killall hhvm")
        #os.system ("sudo /usr/bin/hhvm --mode daemon -vServer.Type=fastcgi");

    # cgi-fcgi allows to make a request to php-fpm
    # grep string "time: <number>" from stdout, then get number with awk
    requestString = "DOCUMENT_ROOT=\"qweqwe\" SCRIPT_FILENAME=\"{{testFile}}\" REQUEST_METHOD=GET cgi-fcgi -bind -connect 127.0.0.1:{port} |grep time |awk '{{{{print $2}}}}'"
    requestString = requestString.format (port = port)

    print "{0} ({1}):".format (testSuiteName, engine)

    absPath = os.path.join (os.getcwd (), testSuiteDir)
    for testFile in sorted(os.listdir (absPath)):
        if not testFile.startswith ("test"): continue

        sum = 0
        min = float ('inf')
        max = 0
        res1 = 0
        res2 = 0
        res3 = 0

        if printAllIterations: print ("  "),
        for i in range (iterationsNum):
            rs = requestString.format (testFile = os.path.join (absPath, testFile))

            # time = float (subprocess.check_output (rs, shell=True))
            out = subprocess.check_output (rs, shell=True)
            try:
                time = float (out)
            except ValueError:
                print "Error: ", out, testFile
                exit ()
            if printAllIterations: print ("{0}: {1:<8.4f}".format (i, time)),

            sum += time
            if min > time: min = time
            if max < time: max = time
            if i == 0: res1 = time
            if i == 1: res2 = time
            if i == 2: res3 = time

        if printAllIterations: print
        print "  {0}: avg: {1:<8.4f} min: {2:<8.4f} max: {3:<8.4f} 1st: {4:<8.4f} 2nd: {5:<8.4f} 3rd: {6:<8.4f}, {7} iterations".format (testFile.ljust (25), sum / iterationsNum, min, max, res1, res2, res3, iterationsNum)

runTest ("PHP", "Blitz", "Blitz")
runTest ("PHP", "Blitz-file", "Blitz from file")
print "\n\n"
runTest ("HHVM", "handlebars-lightncandy-php", "Handlebars lightncandy from string")
runTest ("HHVM", "handlebars-lightncandy-php-file", "Handlebars lightncandy from file")
runTest ("HHVM", "Latte", "Latte", 3)
runTest ("HHVM", "Smarty", "Smarty", 3)
runTest ("HHVM", "Fenom", "Fenom", 3)
runTest ("HHVM", "mustache", "Mustache")
runTest ("HHVM", "tassembly-php", "TAssembly")
runTest ("HHVM", "mediawiki", "Mediawiki Templates")
runTest ("HHVM", "twignocache", "Twig String (No Cache)")
runTest ("HHVM", "twignocache_file", "Twig File (No Cache)")
runTest ("HHVM", "twigcache_file", "Twig File (Cached)")

