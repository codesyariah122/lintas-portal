import * as React from "react";
import { NextPage } from "next";
import { useRouter } from "next/router";
import Image from "next/image";
import { Inter } from "next/font/google";
import { ListGroup } from "flowbite-react";
import { RootLayout } from "@/layouts/RootLayout";
import { useGeoLocator, useArticleData } from "@/hooks";
import { ArticleLists } from "@/components";

const inter = Inter({ subsets: ["latin"] });

const Home: NextPage = () => {
  const router = useRouter();
  const {
    data: dataGeo,
    isLoading: isLoadingGeo,
    isError: isErrorGeo,
  } = useGeoLocator();

  const {
    data: articleLists,
    isLoading: isLoadingArticle,
    isError: isErrorArticle,
  } = useArticleData();

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
                <ListGroup.Item>
                  City : {dataGeo?.data?.geo_data?.city}
                </ListGroup.Item>
                <ListGroup.Item>
                  Region : {dataGeo?.data?.geo_data?.region}
                </ListGroup.Item>
                <ListGroup.Item>
                  location : {dataGeo?.data?.geo_data?.loc}
                </ListGroup.Item>
              </ListGroup>
            )}
          </div>
        )}
      </div>
      <div className="flex justify-center w-full mb-16">
        <ArticleLists
          articleLists={articleLists}
          isLoading={isLoadingArticle}
          isError={isErrorArticle}
        />
      </div>
    </RootLayout>
  );
};

export default Home;
