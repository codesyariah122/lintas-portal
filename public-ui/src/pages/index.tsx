import * as React from "react";
import { NextPage } from "next";
import { useRouter } from "next/router";
import Image from "next/image";
import { Inter } from "next/font/google";
import { ListGroup } from "flowbite-react";
import { RootLayout } from "@/layouts/RootLayout";
import { useAllArticles } from "@/hooks";
import { AllArticles } from "@/components";

const inter = Inter({ subsets: ["latin"] });

const Home: NextPage = () => {
  const router = useRouter();

  const {
    data: articles,
    isLoading: isLoadingArticles,
    isError: isErrorArticles,
  } = useAllArticles();

  return (
    <RootLayout>
      <main className="flex justify-center py-12">
        {isLoadingArticles ? (
          <h1 className="text-indigo-800 font-bold">Loading now ...</h1>
        ) : (
          <AllArticles
            articles={articles}
            loading={isLoadingArticles}
            error={isErrorArticles}
          />
        )}
      </main>
    </RootLayout>
  );
};

export default Home;
