using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Threading;
using System.Net;
using System.Web;

namespace Server
{
    class Program
    {
        static bool stop = false;
        static bool exit = false;

        static bool logoffbutton = false;
        static bool matchmakingbutton = false;


        static void Exit()
        {
            exit = true;
            Environment.Exit(0);
        }
        
        static void Stop()
        {
            if (!stop)
            {
                stop = true;
                Console.WriteLine("Communication stopped");
            }
            else
            {
                Console.WriteLine("Communication is already stopped");
            }
        }

        static void NoStop()
        {
            if (stop)
            {
                stop = false;
                Console.WriteLine("Communication started");
            }
            else
            {
                Console.WriteLine("Communication is already running");
            }
        }

        static void NoMatchmaking()
        {
            if (!matchmakingbutton)
            {
                matchmakingbutton = true;
                Console.WriteLine("Matchmaking service stopped");
            }
            else
            {
                Console.WriteLine("Matchmaking service is currently stopped");
            }
        }

        static void Matchmakingturn()
        {
            if (matchmakingbutton)
            {
                matchmakingbutton = false;
                Console.WriteLine("Matchmaking service has been started");
            }
            else
            {
                Console.WriteLine("Matchmaking service is currently running");
            }
        }

        static void NoLogoff()
        {
            if (!logoffbutton)
            {
                logoffbutton = true;
                Console.WriteLine("User logging off service stopped");
            }
            else
            {
                Console.WriteLine("User logging off service is currently stopped");
            }
        }

        static void LogOffTurn()
        {
            if (logoffbutton)
            {
                matchmakingbutton = false;
                Console.WriteLine("User logging off service has been started");
            }
            else
            {
                Console.WriteLine("User logging off service is currently running");
            }
        }
        
        static void HelpGlobal()
        {
            Console.WriteLine("stop - stopping all services from communicating with database");
            Console.WriteLine("exit - closes all services and program");
            Console.WriteLine("matchmaking - turns on matchmaking service (default on)");
            Console.WriteLine("logoff - turns on automatic user logging off (default on)");
            Console.WriteLine("no * - used with other commands, oposite than command written next");
        }

        static int ReadKeyboard(string command)
        {
            switch (command)
            {
                case "stop":
                    Stop();
                    break;
                case "no stop":
                    NoStop();
                    break;
                case "exit":
                    Exit();
                    break;
                case "no matchmaking":
                    NoMatchmaking();
                    break;
                case "matchmaking":
                    Matchmakingturn();
                    break;
                case "no logoff":
                    NoLogoff();
                    break;
                case "logoff":
                    LogOffTurn();
                    break;
                case "help":
                    HelpGlobal();
                    break;
                default:
                    Console.WriteLine("Incorrect command");
                    break;
            }


            return 0;
        }

        static void GetResponse()
        {
            while (!exit)
            {
                Console.WriteLine("");
                Console.Write(">");
                string command = Console.ReadLine();
                ReadKeyboard(command);
            }
        }

        static void Logoff(object o)
        {
            if (!stop && !exit && !logoffbutton)
            {
                //byte[] response = new System.Net.WebClient().DownloadData("http://testhtml5.wex.pl/logoff.php");
                //WebClient client = new WebClient();
                //var content = client.DownloadString("http://testhtml5.wex.pl/logoff.php");
                WebRequest request = WebRequest.Create("http://testhtml5.wex.pl/logoff.php");
                request.Timeout = 4000;
                try
                {
                    WebResponse response = request.GetResponse();
                }
                catch (Exception e)
                {
                    Console.WriteLine("[Warning]: Logoff request timed out");
                }
            }
        }

        static void LogoffThread()
        {
                Timer logoff = new Timer(Logoff, null, 0, 5000);
        }

        static void Matchmaking(object o)
        {
            if (!stop && !exit && !matchmakingbutton)
            {
                //byte[] response = new System.Net.WebClient().DownloadData("http://testhtml5.wex.pl/matching.php");
                WebRequest request = WebRequest.Create("http://testhtml5.wex.pl/matching.php");
                request.Timeout = 4000;
                try
                {
                    WebResponse response = request.GetResponse();
                }
                catch (Exception e)
                {
                    Console.WriteLine("[Warning]: Matching request timed out");
                }
            }
        }

        static void MatchmakingThread()
        {
                Timer mm = new Timer(Matchmaking, null, 0, 5000);
        }

        static void MOTD()
        {
            Console.WriteLine("Server of card game. Unauthorized access prohibited!");
            Console.WriteLine("Write help to get list of commands");
        }

        static void Main(string[] args)
        {
            MOTD();
            Thread input = new Thread(GetResponse);
            input.Start();
            Thread logoff = new Thread(LogoffThread);
            logoff.Start();
            Thread matchmaking = new Thread(MatchmakingThread);
            matchmaking.Start();


        }
    }
}
