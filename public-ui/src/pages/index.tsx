import * as React from "react";
import { NextPage } from "next";
import { useRouter } from "next/router";
import Image from "next/image";
import { Inter } from "next/font/google";
import { ListGroup } from "flowbite-react";
import { RootLayout } from "@/layouts/RootLayout";
import { useGeoLocator } from "@/hooks";

const inter = Inter({ subsets: ["latin"] });

const Home: NextPage = () => {
  const router = useRouter();
  const {
    data: dataGeo,
    isLoading: isLoadingGeo,
    isError: isErrorGeo,
  } = useGeoLocator();

  return (
    <RootLayout>
      <div className="flex justify-center py-12">
        {isLoadingGeo ? (
          <div>
            <h1 className="text-red-800 font-semibold">Loading ...</h1>
          </div>
        ) : (
          <div>
            {dataGeo && (
              <ListGroup>
                <ListGroup.Item>
                  IP : {dataGeo?.data?.geo_data?.ip}
                </ListGroup.Item>
              </ListGroup>
            )}
          </div>
        )}
      </div>
    </RootLayout>
  );
};

export default Home;
