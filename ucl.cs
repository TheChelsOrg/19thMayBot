using System;
using System.Configuration;
using System.IO;
using System.Net;
using System.Threading;

namespace ucl
{
    public class Program
    {
        private static void Main(string[] args)
        {
            var consumerKey = ConfigurationManager.AppSettings["consumerKey"];
            var consumerKeySecret = ConfigurationManager.AppSettings["consumerKeySecret"];
            var accessToken = ConfigurationManager.AppSettings["accessToken"];
            var accessTokenSecret = ConfigurationManager.AppSettings["accessTokenSecret"];
            var twitter = new TwitterApi(consumerKey, consumerKeySecret, accessToken, accessTokenSecret);
            var cvsFile = ConfigurationManager.AppSettings["csvFile"];
            var tweet = ConfigurationManager.AppSettings["tweet"];

            WebRequest request = WebRequest.Create(cvsFile);
            HttpWebResponse response = (HttpWebResponse)request.GetResponse();
            Stream dataStream = response.GetResponseStream();

            if (dataStream != null)
                using (var reader = new StreamReader(dataStream))
                {
                    while (!reader.EndOfStream)
                    {
                        var firstline = reader.ReadLine(); // first line to discard
                        var line = reader.ReadLine();
                        if (line == null) continue;
                        var values = line.Split(new[] { ',' }, 2);
                        var timer = int.Parse(values[0]);
                        Thread.Sleep(timer > 0 ? timer*60000 : 0);
                        if (tweet == "on") { 
                            var twitterResponse = twitter.Tweet(values[1]);
                            Console.WriteLine(twitterResponse.Result);
                        }                       
                        Console.WriteLine("Tweet : " + timer + " - " + values[1]);
                    }
                }
            Console.WriteLine("---");
        }
    }
}
